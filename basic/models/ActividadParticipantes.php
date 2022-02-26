<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actividad_participantes".
 *
 * @property int $id
 * @property string $fecha_registro Fecha y Hora de registro de participación en la actividad por parte del usuario.
 * @property int $actividad_id Actividad relacionada
 * @property int $usuario_id Usuario relacionado, que participara en la actividad.
 * @property string|null $datos_participacion Datos adicionales del participante en su registro de participación. Será NULL mientras no haya un formulario de participación.
 * @property string|null $fecha_cancelacion Fecha y Hora de cancelación de la participación por parte del usuario.
 * @property string|null $notas_cancelacion Notas sobre el motivo de la cancelación de la participación del usuario o NULL si no lo indica o no hay.
 */
class ActividadParticipantes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actividad_participantes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_registro', 'actividad_id', 'usuario_id'], 'required'],
            [['fecha_registro', 'fecha_cancelacion'], 'safe'],
            [['actividad_id', 'usuario_id'], 'integer'],
            [['datos_participacion', 'notas_cancelacion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_registro' => 'Fecha Registro',
            'actividad_id' => 'Actividad ID',
            'usuario_id' => 'Usuario ID',
            'datos_participacion' => 'Datos Participacion',
            'fecha_cancelacion' => 'Fecha Cancelacion',
            'notas_cancelacion' => 'Notas Cancelacion',
        ];
    }
}
