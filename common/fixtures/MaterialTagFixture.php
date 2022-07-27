<?php

namespace common\fixtures;

use yii\test\ActiveFixture;

class MaterialTagFixture extends ActiveFixture
{
    public $tableName = 'material_tag';

    protected function getData(): array
    {
        $fixtures = [];

        for ($i = 30; $i > 10; --$i) {
            $fixtures[] = [
                'material_id' => $i,
                'tag_id' => random_int(1, 10),
            ];
        }

        return $fixtures;
    }
}