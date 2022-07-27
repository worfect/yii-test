<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%links}}`.
 */
class m220727_105637_create_links_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%links}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'material_id' => $this->integer(),
            'url' => $this->string()->notNull(),
            'title' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk-material-link_id',
            'links',
            'material_id',
            'materials',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%links}}');
    }
}
