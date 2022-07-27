<?php

namespace common\models;

/**
 * Type model
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

    public function getMaterial()
    {
        return $this->hasMany(Material::class, ['id' => 'material_id']);
    }
}
