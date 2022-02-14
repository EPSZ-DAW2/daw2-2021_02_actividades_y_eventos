<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Actividades;

/**
 * ActividadesSearch represents the model behind the search form of `app\models\Actividades`.
 */
class ActividadesSearch extends Actividades
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'duracion_estimada', 'area_id', 'edad_id', 'publica', 'visible', 'terminada', 'num_denuncias', 'bloqueada', 'max_participantes', 'min_participantes', 'reserva_participantes', 'votosOK', 'votosKO', 'crea_usuario_id', 'modi_usuario_id'], 'integer'],
            [['titulo', 'descripcion', 'fecha_celebracion', 'detalles_celebracion', 'direccion', 'como_llegar', 'notas_lugar', 'notas', 'url', 'imagen_id', 'fecha_terminacion', 'notas_terminacion', 'fecha_denuncia1', 'fecha_bloqueo', 'notas_bloqueo', 'formulario_participacion', 'crea_fecha', 'modi_fecha', 'notas_admin'], 'safe'],
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
        $query = Actividades::find();

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
            'fecha_celebracion' => $this->fecha_celebracion,
            'duracion_estimada' => $this->duracion_estimada,
            'area_id' => $this->area_id,
            'edad_id' => $this->edad_id,
            'publica' => $this->publica,
            'visible' => $this->visible,
            'terminada' => $this->terminada,
            'fecha_terminacion' => $this->fecha_terminacion,
            'num_denuncias' => $this->num_denuncias,
            'fecha_denuncia1' => $this->fecha_denuncia1,
            'bloqueada' => $this->bloqueada,
            'fecha_bloqueo' => $this->fecha_bloqueo,
            'max_participantes' => $this->max_participantes,
            'min_participantes' => $this->min_participantes,
            'reserva_participantes' => $this->reserva_participantes,
            'votosOK' => $this->votosOK,
            'votosKO' => $this->votosKO,
            'crea_usuario_id' => $this->crea_usuario_id,
            'crea_fecha' => $this->crea_fecha,
            'modi_usuario_id' => $this->modi_usuario_id,
            'modi_fecha' => $this->modi_fecha,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'detalles_celebracion', $this->detalles_celebracion])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'como_llegar', $this->como_llegar])
            ->andFilterWhere(['like', 'notas_lugar', $this->notas_lugar])
            ->andFilterWhere(['like', 'notas', $this->notas])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'imagen_id', $this->imagen_id])
            ->andFilterWhere(['like', 'notas_terminacion', $this->notas_terminacion])
            ->andFilterWhere(['like', 'notas_bloqueo', $this->notas_bloqueo])
            ->andFilterWhere(['like', 'formulario_participacion', $this->formulario_participacion])
            ->andFilterWhere(['like', 'notas_admin', $this->notas_admin]);

        return $dataProvider;
    }


 public function search_publico($params)
  {
      $query = Actividades::find();

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
          'fecha_celebracion' => $this->fecha_celebracion,
          'duracion_estimada' => $this->duracion_estimada,
          'area_id' => $this->area_id,
          'edad_id' => $this->edad_id,
          'publica' => 1,
          'visible' => $this->visible,
          'terminada' => $this->terminada,
          'fecha_terminacion' => $this->fecha_terminacion,
          'num_denuncias' => $this->num_denuncias,
          'fecha_denuncia1' => $this->fecha_denuncia1,
          'bloqueada' => $this->bloqueada,
          'fecha_bloqueo' => $this->fecha_bloqueo,
          'max_participantes' => $this->max_participantes,
          'min_participantes' => $this->min_participantes,
          'reserva_participantes' => $this->reserva_participantes,
          'votosOK' => $this->votosOK,
          'votosKO' => $this->votosKO,
          'crea_usuario_id' => $this->crea_usuario_id,
          'crea_fecha' => $this->crea_fecha,
          'modi_usuario_id' => $this->modi_usuario_id,
          'modi_fecha' => $this->modi_fecha,
      ]);

      $query->andFilterWhere(['like', 'titulo', $this->titulo])
          ->andFilterWhere(['like', 'descripcion', $this->descripcion])
          ->andFilterWhere(['like', 'detalles_celebracion', $this->detalles_celebracion])
          ->andFilterWhere(['like', 'direccion', $this->direccion])
          ->andFilterWhere(['like', 'como_llegar', $this->como_llegar])
          ->andFilterWhere(['like', 'notas_lugar', $this->notas_lugar])
          ->andFilterWhere(['like', 'notas', $this->notas])
          ->andFilterWhere(['like', 'url', $this->url])
          ->andFilterWhere(['like', 'imagen_id', $this->imagen_id])
          ->andFilterWhere(['like', 'notas_terminacion', $this->notas_terminacion])
          ->andFilterWhere(['like', 'notas_bloqueo', $this->notas_bloqueo])
          ->andFilterWhere(['like', 'formulario_participacion', $this->formulario_participacion])
          ->andFilterWhere(['like', 'notas_admin', $this->notas_admin]);

      return $dataProvider;
  }
}
