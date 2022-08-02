<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%types}}`.
 */
final class m220727_105200_create_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%types}}', [
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
        $this->dropTable('{{%types}}');
    }
}
