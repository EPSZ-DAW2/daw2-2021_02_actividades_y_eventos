<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\models\Usuarios;


/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form ActiveForm */
$this->title='Registro';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signin">
<h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 col-form-label'],
        ],
        ]); ?>
        <?= $form->field($model, 'fecha_registro')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false); ?>
        <?= $form->field($model, 'fecha_acceso')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false); ?>
        <?= $form->field($model, 'notas_bloqueo')->hiddenInput(['value'=>NULL])->label(false); ?>
        <?= $form->field($model, 'fecha_bloqueo')->hiddenInput(['value'=>NULL])->label(false); ?>
        <?= $form->field($model, 'nick')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'nombre') ?>
        <?= $form->field($model, 'apellidos') ?>
        <?php //en el formulario del rol se le pone la N por defecto y se oculta ?>
        <?= $form->field($model, 'fecha_nacimiento')->textInput(['placeholder' => "YYYY-MM-DD"]);?>
        <?= $form->field($model, 'direccion') ?>      
        <?= $form->field($model, 'area_id') ?>
        <?= $form->field($model, 'num_accesos')->hiddenInput(['value'=>0])->label(false); ?>
        <?= $form->field($model, 'bloqueado')->hiddenInput(['value'=>0])->label(false); ?>
        <?= $form->field($model, 'rol')->hiddenInput(['value'=> "N"])->label(false); ?>
        <?= $form->field($model, 'confirmado')->hiddenInput(['value'=> 0])->label(false); ?>
        <?= $form->field($model, 'avisos_por_correo')->checkbox() ?>
        <?= $form->field($model, 'avisos_agrupados')->checkbox() ?>
        <?= $form->field($model, 'avisos_marcar_leidos')->checkbox() ?>
        <?= $form->field($model, 'avisos_eliminar_borrados')->checkbox() ?>
        
        
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-signin -->
