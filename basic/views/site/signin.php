<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form ActiveForm */
?>
<div class="site-signin">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'nick') ?>
        <?= $form->field($model, 'nombre') ?>
        <?= $form->field($model, 'apellidos') ?>
        <?= $form->field($model, 'rol') ?>
        <?= $form->field($model, 'confirmado') ?>
        <?= $form->field($model, 'fecha_nacimiento') ?>
        <?= $form->field($model, 'fecha_registro') ?>
        <?= $form->field($model, 'fecha_acceso') ?>
        <?= $form->field($model, 'fecha_bloqueo') ?>
        <?= $form->field($model, 'direccion') ?>
        <?= $form->field($model, 'notas_bloqueo') ?>
        <?= $form->field($model, 'area_id') ?>
        <?= $form->field($model, 'avisos_por_correo') ?>
        <?= $form->field($model, 'avisos_agrupados') ?>
        <?= $form->field($model, 'avisos_marcar_leidos') ?>
        <?= $form->field($model, 'avisos_eliminar_borrados') ?>
        <?= $form->field($model, 'num_accesos') ?>
        <?= $form->field($model, 'bloqueado') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-signin -->
