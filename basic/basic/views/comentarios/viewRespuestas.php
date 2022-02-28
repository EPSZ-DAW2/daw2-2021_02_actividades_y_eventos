<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */

$this->title = Yii::t('app', 'Respuestas');
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viewRespuestas">

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
			
            //'id',
            //'actividad_id',
            //'crea_usuario_id',
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
			
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}',],
        ],
    ]); ?> 
     
</div>