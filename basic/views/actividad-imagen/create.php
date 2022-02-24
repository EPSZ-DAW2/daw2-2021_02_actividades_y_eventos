<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadImagenes */

$this->title = 'Create Actividad Imagenes';
$this->params['breadcrumbs'][] = ['label' => 'Actividad Imagenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividad-imagenes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
