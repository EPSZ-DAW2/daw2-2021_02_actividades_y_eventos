<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ActividadParticipantes]].
 *
 * @see ActividadParticipantes
 */
class ActividadParticipantesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ActividadParticipantes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ActividadParticipantes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
