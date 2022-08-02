<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
final class m220727_105100_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),

            'title' => $this->string()->notNull()->unique(),

            'updated_at' => $this->integer(),
            'created_at' => $this->integer()->defaultExpression(time()),
            'deleted_at' => $this->integer()->defaultExpression(0),
            'created_by_id' => $this->integer(),
            'updated_by_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}
