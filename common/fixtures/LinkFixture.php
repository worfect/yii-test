<?php

namespace common\fixtures;

use Faker\Factory;
use yii\test\ActiveFixture;

class LinkFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Link';

    protected function getData(): array
    {
        $faker = Factory::create();
        $fixtures = [];

        for ($i = 40; $i > 0; --$i) {
            $fixtures[] = [
                'url' => $faker->url(),
                'title' => $faker->text(40),
                'material_id' => rand(1, 20),
            ];
        }

        return $fixtures;
    }
}