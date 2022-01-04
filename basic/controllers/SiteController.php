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
use yii\helpers\Html;

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
    public function actionLogin() //FALTA COMPROBAR SI ESTA CONFIRMADO
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login() ) 
        {
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

        if ($model->load(Yii::$app->request->post())) 
        {
            if ($model->validate()) 
            {
                if (empty($model->area_id)) 
                {
                    $model->area_id=0;
                }
                
                if ($model->save()) 
                {
                   //return $this->redirect(['confirmar']);
                   return $this->redirect(array('confirmar', 'id' => $model->id));
                   //return $this->redirect(array('?r=site%2Fconfirmar', 'param'=>$model->confirmado));
                }
                else 
                {
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

    public function actionConfirmar()
    {
        $model2 = new Usuarios();

        if ($model2->load(Yii::$app->request->post())) 
        {
            $table= new Usuarios();

            if (Yii::$app->request->get()) 
            {
                $id= Html::encode($_GET["id"]);
                if ((int) $id) 
                {
                    $model=$table
                    ->find()
                    ->where("id=:id", [":id"=>$id]);

                    if($model->count()==1)
                    {
                        if ($model2->confirmado==0) 
                        {
                            return $this->redirect(['confirmar']);
                        }
                        
                        $activar=Usuarios::findOne($id);
                        $activar->confirmado=$model2->confirmado;
                        if($activar->update())
                        {
                            return $this->redirect(['login']);
                        }
                        else 
                        {
                            return $this->redirect(['index']);
                        }
                    }
                    else 
                    {
                        return $this->redirect(['about']);
                    }
                }
                else 
                {
                    return $this->redirect(['contact']);
                } 
            }
            else {
                return $this->redirect(['about']);
            }
        }
        
        return $this->render('confirmar', [
            'model' => $model2,
        ]);
    }

    public function actionCreate()
    {
        $model = new Usuarios();
        if(isset($_POST['Model']))
        {
            $model->attributes=$_POST['Model'];
            if($model->save())
            {
                $this->render('update',array('model'=>$model));
            }
        }
        $this->render('create',array('model'=>$model));
    }
}
?>
