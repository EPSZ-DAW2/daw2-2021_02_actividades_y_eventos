<?php

use yii\helpers\Html;
use yii\web\User;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosCategorias */

$this->title = Yii::t('app', 'Seleccione la actividad que quiera seguir');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actividad Seguimientos'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="actividad-seguimientos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formseguir', [
        'model' => $model,
        'lista' => $lista,
    ]) ?>

    </br>
        <?= Html::a(Yii::t('app', 'Volver a mis actividades'), ['actividad-seguimientos/fichaseguimientos'], ['class' => 'btn btn-primary']) ?>

</div>