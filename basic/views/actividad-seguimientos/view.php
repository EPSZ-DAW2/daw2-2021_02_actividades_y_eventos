<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Actividades;
use app\models\ActividadSeguimientos;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadSeguimientos */

$this->title = Yii::t('app', 'Informacion mas detallada de la actividad seguida');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Actividad Seguimientos'), 'url' => ['fichaseguimientos']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="actividad-seguimientos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><?php
    if(!Yii::$app->user->isGuest)
            {
                $rol= Yii::$app->user->identity->rol;
                if($rol=="A" || $rol=="M")
                {
                    echo( Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) );
                    echo( Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) );
                }
                
               if($rol=="N"){
                    echo( Html::a(Yii::t('app', 'Dejar de seguir'), ['delete', 'id' => $_GET['id']], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) );
                }
                
            }?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'actividad_id',
            //'usuario_id',
            //'fecha_seguimiento',

            [
                'attribute' => 'Actividad',
                'value' => function ($model) {
                    return Actividades::find()->where(['id'=>$model->actividad_id])->one()->titulo;
                }
            ],

            [
                'attribute' => 'Descripcion',
                'value' => function ($model) {
                    return Actividades::find()->where(['id'=>$model->actividad_id])->one()->descripcion;
                }
            ],

            [
                'attribute' => 'Fecha celebracion',
                'value' => function ($model) {
                    return Actividades::find()->where(['id'=>$model->actividad_id])->one()->fecha_celebracion;
                }
            ],

            [
                'attribute' => 'Duracion estimada',
                'value' => function ($model) {
                    return Actividades::find()->where(['id'=>$model->actividad_id])->one()->duracion_estimada;
                }
            ],

            [
                'attribute' => 'Detalles',
                'value' => function ($model) {
                    return Actividades::find()->where(['id'=>$model->actividad_id])->one()->detalles_celebracion;
                }
            ],

            [
                'attribute' => 'Direccion',
                'value' => function ($model) {
                    return Actividades::find()->where(['id'=>$model->actividad_id])->one()->direccion;
                }
            ],

            [
                'attribute' => 'Fecha inicio de seguimiento',
                'value' => 'fecha_seguimiento',
            ],
        ]
    ]) ?>
</div>
