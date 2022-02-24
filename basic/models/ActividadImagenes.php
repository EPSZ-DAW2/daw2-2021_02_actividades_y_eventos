<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actividad_imagenes".
 *
 * @property int $id
 * @property int $actividad_id Actividad relacionada
 * @property int $orden Orden de aparición de la imagen dentro del grupo de imagenes de la actividad. Opcional.
 * @property string $imagen_id Nombre identificativo (fichero interno) con la imagen para la actividad, aqui no puede ser NULL si no hay.
 */
class ActividadImagenes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actividad_imagenes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['actividad_id', 'imagen_id'], 'required'],
            [['actividad_id', 'orden'], 'integer'],
            [['imagen_id'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'actividad_id' => 'Actividad ID',
            'orden' => 'Orden',
            'imagen_id' => 'Imagen ID',
        ];
    }
}
