<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadSeguimientos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Actividad Seguimientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="actividad-seguimientos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><?php
    if(!Yii::$app->user->isGuest)
            {
                $rol= Yii::$app->user->identity->rol;
                if($rol=="A" || $rol=="M")
                {
                    echo( Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) );
                    echo( Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) );
                }

                if($rol=="N"){
                    echo( Html::a(Yii::t('app', 'Dejar de seguir'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) );
                }
                
            }?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'actividad_id',
            'usuario_id',
            'fecha_seguimiento',
        ],
    ]) ?>
</div>
