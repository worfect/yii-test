<?php

declare(strict_types=1);

namespace frontend\helpers;


use frontend\domains\queries\CustomQuery;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;
use yii2tech\ar\softdelete\SoftDeleteBehavior;
use yii2tech\ar\softdelete\SoftDeleteQueryBehavior;

class CustomActiveRecord extends ActiveRecord
{
    private $_oldAttributes;

    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
                SoftDeleteBehavior::class => [
                    'class' => SoftDeleteBehavior::class,
                    'softDeleteAttributeValues' => [
                        'deleted_at' => time(),
                        'updated_at' => time(),
                        'updated_by_id' => Yii::$app->user->getId(),
                    ],
                    'replaceRegularDelete' => true,
                ],
            ]
        );
    }

    public static function find(): CustomQuery
    {
        $query = new CustomQuery(get_called_class());

        $query->attachBehavior('softDelete', [
            'class' => SoftDeleteQueryBehavior::class,
            'notDeletedCondition' => [
                'deleted_at' => 0,
            ],
        ]);

        return $query->notDeleted();
    }

    protected function insertInternal($attributes = null): bool
    {
        if (!$this->beforeSave(true)) {
            return false;
        }
        $values = $this->getDirtyAttributes($attributes);

        $values['created_by_id'] = Yii::$app->user->getId();
        $values['created_at'] = time();

        if (($primaryKeys = static::getDb()->schema->insert(static::tableName(), $values)) === false) {
            return false;
        }
        foreach ($primaryKeys as $name => $value) {
            $id = static::getTableSchema()->columns[$name]->phpTypecast($value);
            $this->setAttribute($name, $id);
            $values[$name] = $id;
        }

        $changedAttributes = array_fill_keys(array_keys($values), null);
        $this->setOldAttributes($values);
        $this->afterSave(true, $changedAttributes);

        return true;
    }

    protected function updateInternal($attributes = null): bool|int
    {
        if (!$this->beforeSave(false)) {
            return false;
        }
        $values = $this->getDirtyAttributes($attributes);

        $values['updated_by_id'] = Yii::$app->user->getId();
        $values['updated_at'] = time();

        if (empty($values)) {
            $this->afterSave(false, $values);
            return 0;
        }
        $condition = $this->getOldPrimaryKey(true);
        $lock = $this->optimisticLock();
        if ($lock !== null) {
            $values[$lock] = $this->$lock + 1;
            $condition[$lock] = $this->$lock;
        }
        // We do not check the return value of updateAll() because it's possible
        // that the UPDATE statement doesn't change anything and thus returns 0.
        $rows = static::updateAll($values, $condition);

        if ($lock !== null && !$rows) {
            throw new StaleObjectException('The object being updated is outdated.');
        }

        if (isset($values[$lock])) {
            $this->$lock = $values[$lock];
        }

        $changedAttributes = [];
        foreach ($values as $name => $value) {
            $changedAttributes[$name] = $this->_oldAttributes[$name] ?? null;
            $this->_oldAttributes[$name] = $value;
        }
        $this->afterSave(false, $changedAttributes);

        return $rows;
    }
}
