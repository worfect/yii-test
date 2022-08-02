<?php

declare(strict_types=1);

namespace frontend\domains\models;

use frontend\helpers\CustomActiveRecord;
use yii\db\ActiveQuery;

/**
 * Material model.
 *
 * @property int $id
 * @property string $title
 * @property string $type_id [integer]
 * @property string $category_id [integer]
 * @property string $description [varchar(255)]
 * @property string $author [varchar(255)]
 * @property string $links_json [jsonb]
 * @property string $updated_at [integer]
 * @property string $created_at [integer]
 * @property string $deleted_at [integer]
 * @property string $created_by_id [integer]
 * @property-read \yii\db\ActiveQuery $category
 * @property-read \yii\db\ActiveQuery $type
 * @property-read \yii\db\ActiveQuery $tag
 * @property string $updated_by_id [integer]
 */
class Material extends CustomActiveRecord
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

    public function fields(): array
    {
        return [
            'id',
            'title',
            'author',
            'description',
            'links_json',
            'updated_at',
            'created_at',
            'type' => function () {
                return Type::findOne(['id' => $this->type_id]);
            },
            'category' => function () {
                return Category::findOne(['id' => $this->category_id]);
            },
        ];
    }

}
