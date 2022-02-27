<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clase_area_id')->dropDownList($lista, ['prompt' => 'Seleccione la clase de area' ]) ?>
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'area_id')->dropDownList($padre, ['prompt' => 'Seleccione al padre' ])?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
