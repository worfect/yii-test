<?php

namespace frontend\controllers;

use frontend\domains\models\Material;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class ApiController extends ActiveController
{
    public $modelClass = Material::class;

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class' => HttpBearerAuth::class,
//        ];
        return $behaviors;
    }
}