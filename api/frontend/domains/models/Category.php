<?php

declare(strict_types=1);

namespace frontend\domains\models;

use frontend\helpers\CustomActiveRecord;
use yii\db\ActiveQuery;

/**
 * Category model.
 *
 * @property int $id
 * @property string $title
 * @property int $updated_at [timestamp(0)]
 * @property-read \yii\db\ActiveQuery $material
 * @property string $created_at [integer]
 * @property string $deleted_at [integer]
 * @property string $created_by_id [integer]
 * @property string $updated_by_id [integer]
 */
final class Category extends CustomActiveRecord
{
    public static function tableName(): string
    {
        return '{{categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
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
