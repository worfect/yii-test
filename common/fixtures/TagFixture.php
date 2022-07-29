<?php

namespace common\fixtures;

use Faker\Factory;
use yii\test\ActiveFixture;

final class TagFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Tag';

    protected function getData(): array
    {
        $faker = Factory::create();
        $fixtures = [];

        for ($i = 10; $i > 0; --$i) {
            $fixtures[] = [
                'title' => $faker->unique()->word(),
            ];
        }

        return $fixtures;
    }
}
