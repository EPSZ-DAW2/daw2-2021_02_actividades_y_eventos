<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios_area_moderacion".
 *ssad
 * @property int $id
 * @property int $usuario_id Usuario relacionado con un Area para su moderación.
 * @property int $area_id Area relacionada con el Usuario que puede moderarla.
 */
class UsuarioAreaModeracion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios_area_moderacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'area_id'], 'required'],
            [['usuario_id', 'area_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario_id' => 'Usuario ID',
            'area_id' => 'Area ID',
        ];
    }
}
