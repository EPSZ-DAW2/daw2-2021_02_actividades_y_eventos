<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lista_areas".
 *
 * @property int|null $id
 * @property string|null $nombre_area
 */
class ListaArea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lista_areas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre_area'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_area' => 'Nombre Area',
        ];
    }
}
