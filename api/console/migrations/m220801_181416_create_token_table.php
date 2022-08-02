<?php

use yii\db\Migration;

/**
 * Handles the creation of table `token`.
 */
class m220801_181416_create_token_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('token', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'token' => $this->string()->notNull()->unique(),
            'expired_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-token-user_id',
            'token',
            'user_id'
        );

        $this->addForeignKey('fk-token-user_id',
            'token',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('token');
    }
}
