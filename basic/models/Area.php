<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "areas".
 *
 * @property int $id
 * @property string $clase_area_id Código de clase de area: 0=Planeta, 1=Continente, 2=Pais, 3=Estado, 4=Region, 5=Provincia, 6=Poblacion, 7=Barrio, 8=Zona, ...
 * @property string $nombre Nombre del area que lo identifica.
 * @property int|null $area_id Area relacionada. Nodo padre de la jerarquia o CERO si es nodo raiz.
 */
class Area extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'areas';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['clase_area_id', 'nombre'], 'required'],
			[['area_id'], 'integer'],
			[['clase_area_id'], 'string', 'max' => 1],
			[['nombre'], 'string', 'max' => 50],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'clase_area_id' => 'Clase Area ID',
			'nombre' => 'Nombre',
			'area_id' => 'Area ID',
		];
	}
}
