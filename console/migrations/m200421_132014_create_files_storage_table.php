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

        // creates index for column `task_id`
        $this->createIndex(
            '{{%idx-files_storage-task_id}}',
            '{{%files_storage}}',
            'task_id'
        );

        // add foreign key for table `{{%tasks}}`
        $this->addForeignKey(
            '{{%fk-files_storage-task_id}}',
            '{{%files_storage}}',
            'task_id',
            '{{%tasks}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%tasks}}`
        $this->dropForeignKey(
            '{{%fk-files_storage-task_id}}',
            '{{%files_storage}}'
        );

        // drops index for column `task_id`
        $this->dropIndex(
            '{{%idx-files_storage-task_id}}',
            '{{%files_storage}}'
        );

        $this->dropTable('{{%files_storage}}');
    }
}
