<?php

namespace common\fixtures;

use yii\test\ActiveFixture;

class TypeFixture extends ActiveFixture
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