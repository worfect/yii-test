<?php

namespace frontend\domains\queries;

use yii\db\ActiveQuery;

class CustomQuery extends ActiveQuery
{
    public function whereSlug(string $slug): CustomQuery
    {
        return $this->andWhere(['slug' => $slug]);
    }

    public function whereType(int $type): CustomQuery
    {
        return $this->andWhere(['type' => $type]);
    }
}