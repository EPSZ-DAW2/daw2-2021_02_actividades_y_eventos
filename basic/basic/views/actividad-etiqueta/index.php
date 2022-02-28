<?php

use app\assets\Tool;
use app\models\Actividades;
use app\models\ActividadEtiqueta;
use app\models\Etiqueta;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actividad Etiquetas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividad-etiqueta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Actividad Etiqueta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'actividad_id',
            'etiqueta_id',
            [
			'template' => "{delete}",
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ActividadEtiqueta $model, $key, $index, $column) { return Url::toRoute([$action, 'id' => $model->id]); }
            ],
        ],
    ]); ?>


</div>
