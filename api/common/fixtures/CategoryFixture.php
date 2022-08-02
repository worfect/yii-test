<?php

declare(strict_types=1);

namespace common\fixtures;

use Faker\Factory;
use frontend\domains\models\Category;
use yii\test\ActiveFixture;

final class CategoryFixture extends ActiveFixture
{
    public $modelClass = Category::class;

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
