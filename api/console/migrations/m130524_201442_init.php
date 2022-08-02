<?php

use yii\db\Migration;

final class m130524_201442_init extends Migration
{
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),

            'updated_at' => $this->integer(),
            'created_at' => $this->integer()->defaultExpression(time()),
            'deleted_at' => $this->integer()->defaultExpression(0),
            'created_by_id' => $this->integer(),
            'updated_by_id' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('user');
    }
}
