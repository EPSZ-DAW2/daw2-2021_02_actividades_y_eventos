<?php

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


    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'actividad_id',
            //'usuario_id',
            'fecha_seguimiento',

            ['class' => 'yii\grid\ActionColumn'],
        ]
    ]); ?>



</div>
