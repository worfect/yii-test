<?php

declare(strict_types=1);

namespace common\models;

use Yii;
use yii\db\Exception;

class BindTagToMaterialForm extends Material
{
    public string $tagId = '';

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'tagId'], 'required'],
            ['tagId', function ($attribute) {
                if ((new \yii\db\Query())->from('material_tag')
                    ->where(['tag_id' => $this->tagId, 'material_id' => $this->id])->exists()) {
                    $this->addError($attribute, 'Тэг уже прикреплен');
                }
            }],
        ];
    }

    /**
     * @throws Exception
     */
    public function bind()
    {
        if ($this->validate()) {
            Yii::$app->db->createCommand()->insert('material_tag', [
                'material_id' => $this->id,
                'tag_id' => $this->tagId,
            ])->execute();
        }
    }
}
