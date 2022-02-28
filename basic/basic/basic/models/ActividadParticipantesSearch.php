<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ActividadParticipantes;

/**
 * ActividadParticipantesSearch represents the model behind the search form of `app\models\ActividadParticipantes`.
 */
class ActividadParticipantesSearch extends ActividadParticipantes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'actividad_id', 'usuario_id'], 'integer'],
            [['fecha_registro', 'datos_participacion', 'fecha_cancelacion', 'notas_cancelacion'], 'safe'],
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
        $query = ActividadParticipantes::find();

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
            'fecha_registro' => $this->fecha_registro,
            'actividad_id' => $this->actividad_id,
            'usuario_id' => $this->usuario_id,
            'fecha_cancelacion' => $this->fecha_cancelacion,
        ]);

        $query->andFilterWhere(['like', 'datos_participacion', $this->datos_participacion])
            ->andFilterWhere(['like', 'notas_cancelacion', $this->notas_cancelacion]);

        return $dataProvider;
    }
}
