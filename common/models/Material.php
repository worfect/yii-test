<?php

declare(strict_types=1);

namespace common\models;

use yii\db\ActiveQuery;

/**
 * Material model.
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $author
 * @property int $type_id
 * @property int $category_id
 * @property Category $category
 * @property Tag[] $tag
 * @property Type $type
 * @property int $updated_at [timestamp(0)]
 * @property int $created_at [timestamp(0)]
 * @property string $links_json [jsonb]
 */
class Material extends BaseActiveRecord
{
    public static function tableName(): string
    {
        return '{{materials}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title'], 'safe'],
            [['type_id', 'category_id'], 'integer'],
            [['title', 'type_id', 'category_id'], 'required', 'message' => 'Пожалуйста, заполните поле'],
            [['title', 'description', 'author'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => [
                'category_id' => 'id']
            ],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => [
                'type_id' => 'id']
            ],
        ];
    }

    public function getType(): ActiveQuery
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }

    public function getTag(): ActiveQuery
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])
            ->viaTable('material_tag', ['material_id' => 'id']);
    }

    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
