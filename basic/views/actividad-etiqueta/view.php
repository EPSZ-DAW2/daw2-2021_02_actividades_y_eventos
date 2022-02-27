<?php

use yii\helpers\Url;
use app\assets\Tool;
use app\models\Actividades;
use Codeception\Lib\Generator\Actions;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadEtiqueta */

//$this->title = $model->id;
//Tool::json($model);
$this->params['breadcrumbs'][] = ['label' => 'Actividad Etiquetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="actividad-etiqueta-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
    	'dataProvider' => $model,
    	'columns' => [
    		'titulo',
    		'descripcion',
    		[
    			'class' => ActionColumn::class,
    			'template' => '{view}',
    			'urlCreator' => function ($action, Actividades $model, $key, $index, $column) {
    				return Url::to(['actividades/view', 'id' => $model->id]);
    			},
    		],
    	],
    ]) ?>

</div>
