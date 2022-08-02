<?php

namespace frontend\domains\models;

use yii\db\ActiveRecord;

/**
 * User model.
 *
 * @property int $id
 * @property string $user_id [integer]
 * @property string $token [varchar(255)]
 * @property string $expired_at [integer]
 */
class Token extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'token';
    }

    public function generateToken($expire)
    {
        $this->expired_at = $expire;
        $this->token = \Yii::$app->security->generateRandomString();
    }

    public function fields()
    {
        return [
            'token' => 'token',
            'expired' => function () {
                return date(DATE_RFC3339, $this->expired_at);
            },
        ];
    }
}