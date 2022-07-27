<?php

namespace common\models;

/**
 * Tag model
 *
 * @property int $id
 * @property string $title
 * @property int $updated_at [timestamp(0)]
 * @property int $created_at [timestamp(0)]
 */
final class Tag extends BaseActiveRecord
{

    public static function tableName(): string
    {
        return '{{tags}}';
    }

    public function getMaterial()
    {
        return $this->hasMany(Material::class, ['id' => 'material_id'])
            ->viaTable('material_tag', ['tag_id' => 'id']);
    }
}
