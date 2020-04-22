<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%files_storage}}`.
 */
class m200421_132014_create_files_storage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%files_storage}}', [
            'id' => $this->primaryKey(),
            'file_path' => $this->string()->notNull(),
            'file_type' => $this->string()->notNull(),
            'task_id' => $this->integer()->notNull(),
            'dt_add' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%files_storage}}');
    }
}
