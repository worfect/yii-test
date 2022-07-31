<?php

declare(strict_types=1);

namespace common\models;

use yii\db\ActiveQuery;

/**
 * Tag model.
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
        return $this->hasMany(Material::class, ['id' => 'material_id'])
            ->viaTable('material_tag', ['tag_id' => 'id']);
    }
}
