<?php

namespace common\models;

use yii\db\ActiveQuery;

/**
 * Type model.
 *
 * @property int $id
 * @property string $title
 * @property int $updated_at [timestamp(0)]
 * @property int $created_at [timestamp(0)]
 */
final class Type extends BaseActiveRecord
{
    public static function tableName(): string
    {
        return '{{types}}';
    }

    public function getMaterial(): ActiveQuery
    {
        return $this->hasMany(Material::class, ['material_id' => 'id']);
    }
}
