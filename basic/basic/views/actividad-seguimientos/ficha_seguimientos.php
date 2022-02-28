<?php

use app\models\Actividades;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActividadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ficha Resumida Seguimientos de Actividades');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividad-seguimientos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Seguir una actividad'), ['actividad-seguimientos/seguir'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'actividad_id',
            //'usuario_id',
            //'fecha_seguimiento',

            [
                'attribute' => 'Actividad',
                'value' => function ($model) {
                    return Actividades::find()->where(['id'=>$model->actividad_id])->one()->titulo;
                }
            ],

            [
                'attribute' => 'Fecha inicio de seguimiento',
                'value' => 'fecha_seguimiento',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {delete}',
            ],
        ]
    ]); ?>



</div>
