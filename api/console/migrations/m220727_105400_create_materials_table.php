<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%materials}}`.
 */
final class m220727_105400_create_materials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%materials}}', [
            'id' => $this->primaryKey(),
            'updated_at' => $this->timestamp(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'type_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->string(),
            'author' => $this->string(),
            'links_json' => $this->json(),
        ]);

        $this->addForeignKey(
            'fk-material-type_id',
            'materials',
            'type_id',
            'types',
            'id'
        );

        $this->addForeignKey(
            'fk-material-category_id',
            'materials',
            'category_id',
            'categories',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%materials}}');
    }
}
