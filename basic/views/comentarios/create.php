<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */

$this->title = 'Create Comentarios';
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = $model->comentario_id;
?>
<div class="comentarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'actividad' => $actividad_id,
        'comentario_id' => $model->comentario_id,
    ]) ?>

</div>
