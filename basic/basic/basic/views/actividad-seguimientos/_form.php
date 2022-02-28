<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Actividades;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadSeguimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividad-seguimientos-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model->actividadSeguimientos, 'actividad_id')->textInput() ?>

    <?= $form->field($model->actividadSeguimientos, 'usuario_id')->textInput() ?>

    <?= $form->field($model->actividadSeguimientos, 'fecha_seguimiento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>