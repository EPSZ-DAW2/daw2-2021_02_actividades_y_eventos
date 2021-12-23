<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\models\Usuarios;


/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form ActiveForm */
$this->title='Sign in';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signin">
<h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label'],
        ],
        ]); ?>

        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'nick') ?>
        <?= $form->field($model, 'nombre') ?>
        <?= $form->field($model, 'apellidos') ?>
        <?php //$model->rol="N"; ?>
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
