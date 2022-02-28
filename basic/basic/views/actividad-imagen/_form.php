<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadImagenes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividad-imagenes-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'actividad_id')->dropDownList($acti, ['prompt'=>'Seleccione una
	Actividad']) ?>
    <?= $form->field($model, 'orden')->textInput() ?>
	<?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
