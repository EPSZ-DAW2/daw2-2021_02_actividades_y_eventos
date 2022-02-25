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
}
