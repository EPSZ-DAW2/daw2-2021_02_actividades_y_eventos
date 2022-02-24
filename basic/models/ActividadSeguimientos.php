<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actividad_seguimientos".
 *
 * @property int $id
 * @property int $actividad_id Actividad relacionada
 * @property int $usuario_id Usuario relacionado, seguidor de la actividad.
 * @property string $fecha_seguimiento Fecha y Hora de activación del seguimiento de la actividad por parte del usuario.
 */
class ActividadSeguimientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actividad_seguimientos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['actividad_id', 'usuario_id', 'fecha_seguimiento'], 'required'],
            [['actividad_id', 'usuario_id'], 'integer'],
            [['fecha_seguimiento'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'actividad_id' => Yii::t('app','Actividad ID'),
            'usuario_id' => Yii::t('app','Usuario ID'),
            'fecha_seguimiento' => Yii::t('app','Fecha Seguimiento'),
        ];
    }

    public function actionSalvarFactura() {

        $id=$_GET['id'];
    
        if($id)
            $model=$this->loadModel($id);   
    
        if(isset($_POST['detalle'])) {
    
            //Lo que se guarda en datossal
    
            $model->actividad_id=$_POST['actividad_id'];
            $model->usuario_id=$_POST['usuario_id'];
            $model->fecha_seguimiento=$_POST['fecha_seguimiento'];   
    
            if ($model->save()){
                //buscar factura 
    
                $factura = Actividades::find('actividad_id=:actividad_id and usuario_id=:usuario_id and fecha_seguimiento=:fecha_seguimiento',
    
                array(':actividad_id'=>$model->actividad_id,':usuario_id'=>$model->usuario_id,':fecha_seguimiento'=>$model->fecha_seguimiento));
    
                if(!$factura){//Si no existe crearla
    
                    $factura= new ActividadSeguimientos;
    
                    $factura->actividad_id=$model->actividad_id;
    
                    $factura->usuario_id= Yii::$app->user->identity->rol;
    
                    $factura->fecha_seguimiento=$model->fecha_seguimiento;
    
                    $factura->save();
    
                }
            }
        }
    }   
}
