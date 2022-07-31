<?php

declare(strict_types=1);

namespace common\fixtures;

use yii\test\ActiveFixture;

final class TypeFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Type';

    protected function getData(): array
    {
        return [
            ['title' => 'Книга'],
            ['title' => 'Статья'],
            ['title' => 'Видео'],
            ['title' => 'Сайт\Блог'],
            ['title' => 'Подборка'],
            ['title' => 'Ключевые идеи книги'],
        ];
    }
}
