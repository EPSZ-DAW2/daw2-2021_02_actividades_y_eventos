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
        $session = Yii::$app->session;

        if ($session->isActive )
        {
           
            if (!Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            $model = new LoginForm();

            if ($model->load(Yii::$app->request->post()))
            {
                $var= Usuarios::findByUsername($model->username);

                if($session['loginIntentos'] < 44)
                {
                   
                    if ($var!=null) 
                    {
                        if ($var->confirmado==1) 
                        {
                            if ($model->password==$var->password) 
                            {
                                $model->login();
                                return $this->goBack();
                            }
                            else 
                            {
                                $session['loginIntentos'] = $session['loginIntentos'] + 1;
                                $var->num_accesos++;
                                $var->save();
                                self::logErrorLogin($model->username, $model->password);  
                            }        
                        }
                        else 
                        {
                            return $this->redirect(array('confirmar', 'id' => $var->id));
                        }
                    }
                }
                else 
                {
                    $var->bloqueado=1;
                    $var->fecha_bloqueo=date('Y-m-d H:i:s');
                    $var->notas_bloqueo="bloqueado por superar el limite de intentos de acceso";
                    $var->save();
                    die('numero de intentos maximos alcanzado');
                    //COMENTAR EL DIE Y DESCOMENTAR LO DE ABAJO PARA DESBLOQUEAR LA SESION
                    /*$session['loginIntentos']=0;
                    $session->close();
                    return $this->redirect(['index']);*/
                }
            }

            $model->password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
        else
        {
            $session->open();
            $session['loginIntentos']=0;
            $session['usuario']='';
           /* return $this->render('login', [
                'model' => $model,
            ]);*/
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $session = Yii::$app->session;
        if ($session->isActive)
        {
            $session->close();
        }

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
                   return $this->redirect(array('confirmar', 'id' => $model->id));
                }
                else 
                {
                    self::logErrorSignin($model->nick, $model->email);
                    return $this->redirect(['index']);
                }
            }
            else 
            {
                self::logErrorSignin($model->nick, $model->email);
                return $this->redirect(['signin']);
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
                        $activar=Usuarios::findOne($id);
                        $activar->confirmado=$model2->confirmado;
                        if($activar->update()) //si validas te lleva a login
                        {
                            return $this->redirect(['login']);
                        }
                        else //sino validas te lleva a index
                        {
                            return $this->redirect(['index']);
                        }
                    }
                    else //si el usuario no existe
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

    public function logErrorLogin($usuario, $password)
    {
        $logFile = fopen("../log/log.txt", 'a') or die("Error creando archivo");
        fwrite($logFile, "\n".date("d/m/Y H:i:s")." -> LOGIN: el usuario ".$usuario. " y la password ". $password ." es incorrecta") 
        or 
        die("Error escribiendo en el archivo");
        fclose($logFile);
    }

    public function logErrorSignin($usuario, $email)
    {
        $logFile = fopen("../log/log.txt", 'a') or die("Error creando archivo");
        fwrite($logFile, "\n".date("d/m/Y H:i:s")." -> SIGN IN: el usuario ".$usuario. " o el correo ". $email ." ya existe") 
        or 
        die("Error escribiendo en el archivo");
        fclose($logFile);
    }
}
?>
