<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Actividades;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComentariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comentarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?php 
    
    echo Html::a(Yii::t('app', 'Dar tu opinion'), ['create', 'actividad_id' => $_GET['id'], 'id' => $_GET['id']], ['class' => 'btn btn-primary']);
    // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'actividad_id',

            [
                'attribute' => 'Actividad',
                'value' => function ($model) {
                    return Actividades::find()->where(['id'=>$model->actividad_id])->one()->titulo;
                }
            ],
            
            'texto',
            'crea_fecha',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {delete}',
            ],
        ]
    ]); ?>


</div>
