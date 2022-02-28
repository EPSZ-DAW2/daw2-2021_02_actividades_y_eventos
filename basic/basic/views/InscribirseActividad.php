<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadParticipantes */
/* @var $form ActiveForm */
?>
<div class="InscribirseActividad">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'fecha_registro') ?>
        <?= $form->field($model, 'actividad_id') ?>
        <?= $form->field($model, 'usuario_id') ?>
        <?= $form->field($model, 'fecha_cancelacion') ?>
        <?= $form->field($model, 'datos_participacion') ?>
        <?= $form->field($model, 'notas_cancelacion') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- InscribirseActividad -->
