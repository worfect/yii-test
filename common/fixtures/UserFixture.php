<?php

declare(strict_types=1);

namespace common\fixtures;

use yii\test\ActiveFixture;

final class UserFixture extends ActiveFixture
{
    public $modelClass = 'common\models\User';
}
