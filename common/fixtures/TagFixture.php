<?php

declare(strict_types=1);

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
//              'id' => 1
                'title' => $faker->unique()->word(),
            ];
        }

        return $fixtures;
    }
}
