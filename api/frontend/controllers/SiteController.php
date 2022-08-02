<?php

declare(strict_types=1);

namespace frontend\controllers;

use frontend\domains\forms\LoginForm;
use frontend\domains\models\Token;
use Yii;
use yii\rest\Controller;

/**
 * Site controller.
 */
final class SiteController extends Controller
{

    public function actionLogin(): LoginForm|Token
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->bodyParams, '');
        if ($token = $model->auth()) {
            return $token;
        } else {
            return $model;
        }
    }

    protected function verbs(): array
    {
        return [
            'login' => ['post'],
        ];
    }
}
