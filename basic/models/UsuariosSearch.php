<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form of `app\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'area_id', 'avisos_por_correo', 'avisos_agrupados', 'avisos_marcar_leidos', 'avisos_eliminar_borrados', 'confirmado', 'num_accesos', 'bloqueado'], 'integer'],
            [['email', 'password', 'nick', 'nombre', 'apellidos', 'fecha_nacimiento', 'direccion', 'rol', 'fecha_registro', 'fecha_acceso', 'fecha_bloqueo', 'notas_bloqueo'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Usuarios::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'area_id' => $this->area_id,
            'avisos_por_correo' => $this->avisos_por_correo,
            'avisos_agrupados' => $this->avisos_agrupados,
            'avisos_marcar_leidos' => $this->avisos_marcar_leidos,
            'avisos_eliminar_borrados' => $this->avisos_eliminar_borrados,
            'fecha_registro' => $this->fecha_registro,
            'confirmado' => $this->confirmado,
            'fecha_acceso' => $this->fecha_acceso,
            'num_accesos' => $this->num_accesos,
            'bloqueado' => $this->bloqueado,
            'fecha_bloqueo' => $this->fecha_bloqueo,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'nick', $this->nick])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'rol', $this->rol])
            ->andFilterWhere(['like', 'notas_bloqueo', $this->notas_bloqueo]);

        return $dataProvider;
    }
}
