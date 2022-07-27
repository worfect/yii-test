<?php

namespace common\fixtures;

use Faker\Factory;
use yii\test\ActiveFixture;

class MaterialFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Material';

    protected function getData(): array
    {
        $faker = Factory::create();
        $fixtures = [];

        for ($i = 20; $i > 0; --$i) {
            $fixtures[] = [
                'title' => $faker->text(20),
                'description' => $faker->realText(100),
                'type_id' => rand(1, 5),
                'category_id' => rand(1, 9),
                'author' => $faker->name(),
            ];
        }

        return $fixtures;
    }
}