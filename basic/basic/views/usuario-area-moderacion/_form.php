<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioAreaModeracion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-area-moderacion-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'usuario_id')->dropDownList($usuarios,['prompt'=>'Seleccione el
	moderador']) ?>
    <?= $form->field($model, 'area_id')->dropDownList($area,['prompt'=>'Seleccione la area']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
