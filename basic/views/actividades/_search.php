<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'fecha_celebracion') ?>

    <?= $form->field($model, 'duracion_estimada') ?>

    <?php // echo $form->field($model, 'detalles_celebracion') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'como_llegar') ?>

    <?php // echo $form->field($model, 'notas_lugar') ?>

    <?php // echo $form->field($model, 'area_id') ?>

    <?php // echo $form->field($model, 'notas') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'imagen_id') ?>

    <?php // echo $form->field($model, 'edad_id') ?>

    <?php // echo $form->field($model, 'publica') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <?php // echo $form->field($model, 'terminada') ?>

    <?php // echo $form->field($model, 'fecha_terminacion') ?>

    <?php // echo $form->field($model, 'notas_terminacion') ?>

    <?php // echo $form->field($model, 'num_denuncias') ?>

    <?php // echo $form->field($model, 'fecha_denuncia1') ?>

    <?php // echo $form->field($model, 'bloqueada') ?>

    <?php // echo $form->field($model, 'fecha_bloqueo') ?>

    <?php // echo $form->field($model, 'notas_bloqueo') ?>

    <?php // echo $form->field($model, 'max_participantes') ?>

    <?php // echo $form->field($model, 'min_participantes') ?>

    <?php // echo $form->field($model, 'reserva_participantes') ?>

    <?php // echo $form->field($model, 'formulario_participacion') ?>

    <?php // echo $form->field($model, 'votosOK') ?>

    <?php // echo $form->field($model, 'votosKO') ?>

    <?php // echo $form->field($model, 'crea_usuario_id') ?>

    <?php // echo $form->field($model, 'crea_fecha') ?>

    <?php // echo $form->field($model, 'modi_usuario_id') ?>

    <?php // echo $form->field($model, 'modi_fecha') ?>

    <?php // echo $form->field($model, 'notas_admin') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
