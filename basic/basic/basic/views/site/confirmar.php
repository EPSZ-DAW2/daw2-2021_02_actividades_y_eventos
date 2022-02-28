<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\confirmarForm */
/* @var $form ActiveForm */
?>
<div class="confirmar">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'confirmado')->checkbox() ?>
        
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- confirmar -->
