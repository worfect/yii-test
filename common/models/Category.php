<?php

namespace common\models;

use yii\db\ActiveQuery;

/**
 * Category model.
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required', 'message' => 'Пожалуйста, заполните поле'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique', 'message' => 'Такое значение уже используется'],
        ];
    }

    public function getMaterial(): ActiveQuery
    {
        return $this->hasMany(Material::class, ['category_id' => 'id']);
    }
}
