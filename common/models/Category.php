<?php

namespace common\models;

/**
 * Category model
 *
 * @property int $id
 * @property string $title
 * @property int $updated_at [timestamp(0)]
 * @property int $created_at [timestamp(0)]
 */
final class Category extends BaseActiveRecord
{

    public static function tableName(): string
    {
        return '{{categories}}';
    }

    public function getMaterial()
    {
        return $this->hasMany(Material::class, ['id' => 'material_id']);
    }
}
