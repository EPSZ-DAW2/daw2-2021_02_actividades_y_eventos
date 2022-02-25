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

    <?= $form->field($model, 'actividad_id')->dropDownList($lista,['style'=>'width:25%'])->label('Seguir actividad') ?>
    <?= $form->field($model, 'usuario_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'fecha_seguimiento')->hiddenInput()->label(false) ?>

    </br>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>