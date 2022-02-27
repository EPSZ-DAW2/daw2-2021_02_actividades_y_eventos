<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Comentarios;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */

$this->title = $model->actividad_id;
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php
        $rol= Yii::$app->user->identity->rol;
        if($rol=="A" || $rol=="M"){?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    <?php } ?>
    </p>
            
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'actividad_id',
            'crea_usuario_id',
            'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
            //'comentario_id',
            'texto:ntext',
            //'cerrado',
            'num_denuncias',
            //'fecha_denuncia1',
            'bloqueado',
            'fecha_bloqueo',
            'notas_bloqueo:ntext',
        ],
    ]) ?>
    
    <?=Html::a('Responder', ['createres', 'id' => $model->id, 'actividad_id' => $model->actividad_id, 'comentario_id' => '1'], ['class' => 'btn btn-primary']) ?>
    <?=Html::a('Ver respuestas',['viewrespuestas', 'id' => $model->id, 'actividad_id'=>$model->actividad_id, 'comentario_id'=>'1'],['class' => 'btn btn-primary']) ?>
    
    <?= Html::a('Denunciar', ['denunciar', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to report this item?',
                'method' => 'post',
            ], 
    ])?>
</div>
