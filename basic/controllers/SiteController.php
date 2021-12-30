<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Usuarios;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    /*NUEVAS*/
    public function actionSignin()
    {
        $model = new Usuarios();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                /*
                $model->email= $_POST['Usuarios']['email'];
                $model->password= $_POST['Usuarios']['password'];
                $model->nick= $_POST['Usuarios']['nick'];
                $model->nombre= $_POST['Usuarios']['nombre'];
                $model->apellidos= $_POST['Usuarios']['apellidos'];
                $model->rol= $_POST['Usuarios']['rol'];
                $model->confirmado=$_POST['Usuarios']['confirmado'];
                $model->fecha_nacimiento=$_POST['Usuarios']['fecha_nacimiento'];
                $model->fecha_registro=$_POST['Usuarios']['fecha_registro'];
                $model->fecha_acceso=$_POST['Usuarios']['fecha_acceso'];
                $model->fecha_bloqueo=$_POST['Usuarios']['fecha_bloqueo'];
                $model->direccion=$_POST['Usuarios']['direccion'];
                $model->notas_bloqueo=$_POST['Usuarios']['notas_bloqueo'];
                */
                if (empty($model->area_id)) 
                {
                    $model->area_id=0;
                }
                /*
                $model->avisos_por_correo=$_POST['Usuarios']['avisos_por_correo'];
                $model->avisos_agrupados=$_POST['Usuarios']['avisos_agrupados'];
                $model->avisos_marcar_leidos=$_POST['Usuarios']['avisos_marcar_leidos'];
                $model->avisos_eliminar_borrados=$_POST['Usuarios']['avisos_eliminar_borrados'];
                $model->num_accesos=$_POST['Usuarios']['num_accesos'];
                $model->bloqueado=$_POST['Usuarios']['bloqueado'];
                */
                
                if ($model->save()) 
                {
                   return $this->redirect(['login']);
                }
                else {
                    return $this->redirect(['about']);
                }
            }
            else {
                return $this->redirect(['index']);
                //hacer pagina que diga que te has registrado mal
            }
        }

        return $this->render('signin', [
            'model' => $model,
        ]);
    }
}
