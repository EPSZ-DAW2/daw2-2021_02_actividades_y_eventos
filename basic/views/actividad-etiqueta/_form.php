<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadEtiqueta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividad-etiqueta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'actividad_id')->dropDownList($acti, ['prompt'=>'Seleccione una
	Actividad']) ?>
    <?= $form->field($model, 'etiqueta_id')->dropDownList($etiqueta, ['prompt'=>'Seleccione una
	Etiqueta']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
