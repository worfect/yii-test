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

            'type_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->string(),
            'author' => $this->string(),
            'links_json' => $this->json(),

            'updated_at' => $this->integer(),
            'created_at' => $this->integer()->defaultExpression(time()),
            'deleted_at' => $this->integer()->defaultExpression(0),
            'created_by_id' => $this->integer(),
            'updated_by_id' => $this->integer(),
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
