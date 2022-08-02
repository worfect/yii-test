<?php

declare(strict_types=1);

namespace frontend\domains\models;

use frontend\helpers\CustomActiveRecord;
use yii\db\ActiveQuery;

/**
 * Type model.
 *
 * @property int $id
 * @property string $title
 * @property int $updated_at [timestamp(0)]
 * @property string $created_at [integer]
 * @property string $deleted_at [integer]
 * @property string $created_by_id [integer]
 * @property-read \yii\db\ActiveQuery $material
 * @property string $updated_by_id [integer]
 */
final class Type extends CustomActiveRecord
{
    public static function tableName(): string
    {
        return '{{types}}';
    }

    public function getMaterial(): ActiveQuery
    {
        return $this->hasMany(Material::class, ['material_id' => 'id']);
    }
}
