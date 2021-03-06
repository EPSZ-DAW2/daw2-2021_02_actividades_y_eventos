<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Area */

$this->title = 'Create Area';
$this->params['breadcrumbs'][] = ['label' => 'Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'lista' =>  \yii\helpers\ArrayHelper::map($lista::find()->all(), 'id', 'nombre_area'),
		'padre' =>  \yii\helpers\ArrayHelper::map($padre::find()->all(), 'id', 'nombre'),

    ]) ?>

</div>
