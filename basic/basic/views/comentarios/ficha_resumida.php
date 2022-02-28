<?php

use app\models\Actividades;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComentariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ficha Resumida de comentarios realizados');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'actividad_id',

            [
                'attribute' => 'Actividad',
                'value' => function ($model) {
                    return Actividades::find()->where(['id'=>$model->actividad_id])->one()->titulo;
                }
            ],
            
            'texto',
            'crea_fecha',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}',
            ],
        ]
    ]); ?>



</div>
