<?php

namespace app\controllers;

use Yii;

use app\models\ActividadSeguimientos;
use app\models\ActividadSeguimientosSearch;
use app\models\Actividades;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActividadSeguimientosController implements the CRUD actions for ActividadSeguimientos model.
 */
class ActividadSeguimientosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ActividadSeguimientos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActividadSeguimientosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ActividadSeguimientos model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionFichaseguimientos()
    {
        $searchModel = new ActividadSeguimientosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('ficha_seguimientos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new ActividadSeguimientos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ActividadSeguimientos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionSeguir()
    {
        $model = new ActividadSeguimientos();
        $model->usuario_id=Yii::$app->user->identity->id;
        $model->fecha_seguimiento=date('Y-m-d H:i:s');
           
        if ($model->load(Yii::$app->request->post())){
            if($model->save())
                return $this->redirect(['fichaseguimientos']);
        }
       
        $all = Actividades::find()->all();
        $list =array();
        foreach ($all as  $value) {
           
           if(ActividadSeguimientos::find()->where(['usuario_id' => Yii::$app->user->identity->id,'actividad_id'=>$value->id])->one()==false)
             $list[$value->id]=$value->titulo;
        }
        return $this->render('seguir', [
            'model' => $model,
            'lista'=>$list,
        ]);
    }

    /**
     * Updates an existing ActividadSeguimientos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ActividadSeguimientos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['fichaseguimientos']);
    }

    /**
     * Finds the ActividadSeguimientos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ActividadSeguimientos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ActividadSeguimientos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app','The requested page does not exist.'));
    }
}
