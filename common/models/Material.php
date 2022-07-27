<?php

namespace common\models;


/**
 * Material model
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $author
 * @property int $type_id
 * @property int $category_id
 * @property Category $category
 * @property Link[] $link
 * @property Tag[] $tag
 * @property Type $type
 * @property int $updated_at [timestamp(0)]
 * @property int $created_at [timestamp(0)]
 */
final class Material extends BaseActiveRecord
{

    public static function tableName(): string
    {
        return '{{materials}}';
    }

    public function getType()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }

    public function getLink()
    {
        return $this->hasMany(Link::class, ['id' => 'link_id']);
    }

    public function getTag()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])
            ->viaTable('material_tag', ['material_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
