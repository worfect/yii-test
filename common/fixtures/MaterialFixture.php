<?php

namespace common\fixtures;

use Faker\Factory;
use yii\test\ActiveFixture;

final class MaterialFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Material';

    protected function getData(): array
    {
        $faker = Factory::create();
        $fixtures = [];

        for ($i = 20; $i > 0; --$i) {
            $links = [];

            for ($j = 4; $j > 0; --$j) {
                $links[] = [
                    'url' => $faker->url(),
                    'title' => $faker->text(40),
                    'id' => $j,
                ];
            }
            $fixtures[] = [
                'title' => $faker->text(20),
                'description' => $faker->realText(100),
                'type_id' => rand(1, 5),
                'category_id' => rand(1, 9),
                'author' => $faker->name(),
                'links_json' => json_encode($links),
            ];
        }

        return $fixtures;
    }
}
