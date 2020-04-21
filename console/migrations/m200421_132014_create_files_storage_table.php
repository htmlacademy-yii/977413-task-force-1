<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%files_storage}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%tasks}}`
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
            'file_path' => $this->string(),
            'file_type' => $this->string(),
            'task_id' => $this->integer(),
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
