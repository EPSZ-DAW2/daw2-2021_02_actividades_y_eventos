<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clasificacion Etiquetas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificacion-etiqueta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clasificacion Etiqueta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'clasificacion_id',
            'etiqueta_id',
            'clasificacion_etiqueta_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ClasificacionEtiqueta $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
