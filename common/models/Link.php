<?php

namespace common\models;

/**
 * Link model
 *
 * @property int $id
 * @property string $title
 * @property int $updated_at [timestamp(0)]
 * @property int $created_at [timestamp(0)]
 * @property string $material_id [integer]
 * @property string $url [varchar(255)]
 */
final class Link extends BaseActiveRecord
{

    public static function tableName(): string
    {
        return '{{links}}';
    }

    public function getMaterial()
    {
        return $this->hasOne(Material::class, ['id' => 'material_id']);
    }

}
