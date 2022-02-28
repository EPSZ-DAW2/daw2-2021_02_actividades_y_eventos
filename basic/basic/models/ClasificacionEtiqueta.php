<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clasificacion_etiquetas".
 *
 * @property int $id
 * @property int $clasificacion_id Clasificacion relacionada, para saber a que grupo pertenece.
 * @property int $etiqueta_id Etiqueta relacionada.
 * @property int|null $clasificacion_etiqueta_id Clasificacion_Etiqueta relacionada. Nodo padre de la jerarquia o CERO si es nodo raiz.
 */
class ClasificacionEtiqueta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clasificacion_etiquetas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clasificacion_id', 'etiqueta_id'], 'required'],
            [['clasificacion_id', 'etiqueta_id', 'clasificacion_etiqueta_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clasificacion_id' => 'Clasificacion ID',
            'etiqueta_id' => 'Etiqueta ID',
            'clasificacion_etiqueta_id' => 'Clasificacion Etiqueta ID',
        ];
    }
}
