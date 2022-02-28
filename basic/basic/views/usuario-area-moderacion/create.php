<?php

use app\models\Area;
use app\models\Usuarios;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioAreaModeracion */

$this->title = 'Create Usuario Area Moderacion';
$this->params['breadcrumbs'][] = ['label' => 'Usuario Area Moderacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-area-moderacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'area' => ArrayHelper::map(Area::find()->all(), 'id', 'nombre'),
		'usuarios' => ArrayHelper::map(Usuarios::find()->all(), 'id', 'nombre')
    ]) ?>

</div>
