<?php

namespace frontend\controllers;

use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'frontend/domains/models/User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];

        return $behaviors;
    }
}