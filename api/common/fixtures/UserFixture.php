<?php

declare(strict_types=1);

namespace common\fixtures;

use frontend\domains\models\User;
use yii\test\ActiveFixture;

final class UserFixture extends ActiveFixture
{
    public $modelClass = User::class;

    protected function getData(): array
    {
        return [
            [
                'username' => 'test',
                'password_hash' => '$2y$12$qwnND33o8DGWvFoepotSju7eTAQ6gzLD/zy6W8NCVtiHPbkybz.w6', // 'password'
                'email' => 'test@test.test'
            ],
        ];
    }
}
