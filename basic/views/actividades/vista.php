<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Actividades */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actividades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="actividades-view">

    <h1><?= Html::encode($this->title);
    ?></h1>

    <p>


    </p>

    <?=
    //$model->id;

    //$model->direccion = $model->direccion.$model->como_llegar;
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'titulo:ntext',
            'descripcion:ntext',
            'fecha_celebracion',
            'duracion_estimada',
            'area',
            //'detalles_celebracion:ntext',
            //'direccion:ntext',
            //'como_llegar:ntext',
            //'notas_lugar:ntext',
            //'area_id',
            //'notas:ntext',
            //'url:ntext',
            //'imagen_id',
            'edad',
            'publica',
            'visible',
            'terminada',
            'fecha_terminacion',
            'notas_terminacion:ntext',
            'num_denuncias',
            'fecha_denuncia1',
            'bloqueada',
            'fecha_bloqueo',
            'notas_bloqueo:ntext',
            'max_participantes',
            'min_participantes',
            'reserva_participantes',
            'formulario_participacion:ntext',
            'votosOK',
            'votosKO',
            'crea_usuario_id',
            'crea_fecha',
            'modi_usuario_id',
            'modi_fecha',
            'notas_admin:ntext',
        ],
    ]) ?>

</div>
