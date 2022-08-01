<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%material_tag}}`.
 */
final class m220727_105700_create_material_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%material_tag}}', [
            'material_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-material_id',
            'material_tag',
            'material_id',
            'materials',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-tag_id',
            'material_tag',
            'tag_id',
            'tags',
            'id',
            'CASCADE'
        );

        $this->addPrimaryKey('pk-material_tag', 'material_tag', ['material_id', 'tag_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%material_tag}}');
    }
}
