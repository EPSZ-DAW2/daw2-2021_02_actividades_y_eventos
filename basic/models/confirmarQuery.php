<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[confirmarForm]].
 *
 * @see confirmarForm
 */
class confirmarQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return confirmarForm[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return confirmarForm|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
