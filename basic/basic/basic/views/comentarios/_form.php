<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Actividades;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comentarios-form">

    <?php $form = ActiveForm::begin(); 

    $id= Yii::$app->user->id;
    $fecha_hora = date('Y-m-d h:i:s');
    $fecha_modi = null;
    $modificar = 0;

    ?>
    <?= $form->field($model, 'actividad_id')->hiddenInput(['value' => $_GET['actividad_id']])->label(false) ?>
    <?= $form->field($model, 'crea_usuario_id')->hiddenInput(['value' => $id])->label(false) ?>
    <?= $form->field($model, 'crea_fecha')->hiddenInput(['value' => $fecha_hora])->label(false) ?>
    <?= $form->field($model, 'modi_usuario_id')->hiddenInput()->label(false) ?>

    <?php if($modificar == 1) { $fecha_modi = date('Y-m-d h:i:s'); } ?>
    
    <?= $form->field($model, 'modi_fecha')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'comentario_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'cerrado')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'num_denuncias')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'fecha_denuncia1')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'bloqueado')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'fecha_bloqueo')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'notas_bloqueo')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
