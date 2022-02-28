<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Actividades]].
 *
 * @see Actividades
 */
class ActividadesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Actividades[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Actividades|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
