<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actividad_etiquetas".
 *
 * @property int $id
 * @property int $actividad_id Actividad relacionada
 * @property int $etiqueta_id Etiqueta relacionada.
 */
class ActividadEtiqueta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actividad_etiquetas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['actividad_id', 'etiqueta_id'], 'required'],
            [['actividad_id', 'etiqueta_id'], 'integer'],
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
            'etiqueta_id' => 'Etiqueta ID',
        ];
    }
}
