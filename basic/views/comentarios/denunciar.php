<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */

$this->title = 'Denunciar comentario con id: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locales-report">

    <h1>Denuncia solicitada</h1>
    <?php 
    $rol= Yii::$app->user->identity->rol;
    if($rol=="N"){?>
    <p>Su denuncia se ha notificado correctamente.</p>
    <?php } ?>

    <?php
    $rol= Yii::$app->user->identity->rol;
    if($rol=="A" || $rol=="M"){
    	$model->num_denuncias = $model->num_denuncias + 1;
    	$model->update();
    ?>

    <p><strong>Nº denuncias:</strong> <span class="text-danger"><?= $model->num_denuncias ?></span></p>

    <?php
    	if($model->num_denuncias == 1)
    	{
    		$model->fecha_denuncia1 = date('Y-m-d h:i:s');
    		$model->update();
    	}
    	
    ?>
    <p><strong>Fecha de primera denuncia:</strong> <span class="text-danger"><?= $model->fecha_denuncia1 ?></span></p>
    <p><strong>Fecha de bloqueo:</strong> <span class="text-danger"><?= $model->fecha_bloqueo ?></span></p>
    <p><strong>Notas de bloqueo:</strong> <span class="text-danger"><?= $model->notas_bloqueo ?></span></p>

    <?php } ?>

    <?php
        //Bloqueado por número de denuncias. Por ejemplo: 5.

        if($model->num_denuncias >= 5)
        {
            $model->bloqueado = "1";
            $model->update();

            //Notas de bloqueo
            $model->notas_bloqueo = "Bloqueado por numero de denuncias ";
            $model->update();

            if($model->num_denuncias == 5)
            {
                $model->fecha_bloqueo = date('Y-m-d h:i:s');
                $model->update();
            }
        }
    ?>
</div>