<?php

namespace app\controllers;

use Yii;

use app\models\Actividades;
use app\models\ActividadSeguimientosSearch;
use app\models\ActividadesSearch;
use app\models\ActividadSeguimientos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActividadesController implements the CRUD actions for Actividades model.
 */
class ActividadesController extends Controller
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
     * Lists all Actividades models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActividadesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
      //  $prueba = $dataProvider->andFilterWhere(['like', 'id', 1])
        //var_dump($dataProvider);
        //return $this->render('index', [
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionPublico()
    {
        $searchModel = new ActividadesSearch();
        $dataProvider = $searchModel->search_publico($this->request->queryParams);
        
      //  $prueba = $dataProvider->andFilterWhere(['like', 'id', 1])
        //var_dump($dataProvider);
        return $this->render('publico', [

            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Actividades model.
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
    public function actionViewpublic($id)
    {
        return $this->render('vista', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionFicharesumida()
    {
        $searchModel = new ActividadesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('ficha_resumida', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new Actividades model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Actividades();

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
        $model->actividad_id= $_GET['id'];
        $model->save();

        return $this->redirect(['ficharesumida']);
    }

    /**
     * Updates an existing Actividades model.
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
     * Deletes an existing Actividades model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['ficharesumida']);
    }

    public function actionDeleteseguimiento()
    {
        $searchModel = new ActividadSeguimientos();
        $model= ActividadSeguimientos::find()->where(['actividad_id'=>$_GET['id']])->one()->delete();

        return $this->redirect(['ficharesumida']);
    }

    /**
     * Finds the Actividades model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Actividades the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Actividades::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
