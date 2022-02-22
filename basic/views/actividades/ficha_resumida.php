<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

//http://localhost/DAW2/trabajo/daw2-2021_02_actividades_y_eventos/basic/web/?r=actividades%2Fficharesumida
/* @var $this yii\web\View */
/* @var $searchModel app\models\ActividadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ficha Resumida Actividades');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividades-index">

    <h1><?= Html::encode($this->title) ?></h1>


    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo:ntext',
            'descripcion:ntext',
            'fecha_celebracion',
            'duracion_estimada',
            //'detalles_celebracion:ntext',
            'direccion:ntext',
            //'como_llegar:ntext',
            //'notas_lugar:ntext',
            //'area_id',
            //'notas:ntext',
            //'url:ntext',
            //'imagen_id',
            //'edad_id',
            //'publica1',
            //'visible1',
            //'terminada',
            //'fecha_terminacion',
            //'notas_terminacion:ntext',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueada',
            //'fecha_bloqueo',
            //'notas_bloqueo:ntext',
            //'max_participantes',
            //'min_participantes',
            //'reserva_participantes',
            //'formulario_participacion:ntext',
            //'votosOK',
            //'votosKO',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
            //'notas_admin:ntext',

            //['class' => 'yii\grid\ActionColumn', ],
            [
                'class' => 'yii\grid\ActionColumn', 
                'template' => '{view} {Seguir}',
                'buttons' => [
                    'Seguir' => function($url, $model, $key) {
                        $rol= Yii::$app->user->identity->rol;
                        if($rol!="N") return '';
                        return Html::a('Seguir', ['/actividades/follow'], ['class' => 'btn btn-primary']);
                    }
                ],
            ],
        ]
    ]); ?>



</div>
