<?php

use app\models\Actividades;
use app\models\Etiqueta;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadEtiqueta */

$this->title = 'Create Actividad Etiqueta';
$this->params['breadcrumbs'][] = ['label' => 'Actividad Etiquetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividad-etiqueta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'acti' => ArrayHelper::map(Actividades::find()->all(),'id','titulo'),
		'etiqueta' => ArrayHelper::map(Etiqueta::find()->all(),'id','nombre')
    ]) ?>

</div>
