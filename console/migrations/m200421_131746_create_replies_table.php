<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%replies}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%tasks}}`
 */
class m200421_131746_create_replies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%replies}}', [
            'id' => $this->primaryKey(),
            'dt_add' => $this->dateTime(),
            'rate' => $this->integer(),
            'description' => $this->text(),
            'author_id' => $this->integer(),
            'task_id' => $this->integer(),
            'salary' => $this->float()
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            '{{%idx-replies-author_id}}',
            '{{%replies}}',
            'author_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-replies-author_id}}',
            '{{%replies}}',
            'author_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `task_id`
        $this->createIndex(
            '{{%idx-replies-task_id}}',
            '{{%replies}}',
            'task_id'
        );

        // add foreign key for table `{{%tasks}}`
        $this->addForeignKey(
            '{{%fk-replies-task_id}}',
            '{{%replies}}',
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
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-replies-author_id}}',
            '{{%replies}}'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            '{{%idx-replies-author_id}}',
            '{{%replies}}'
        );

        // drops foreign key for table `{{%tasks}}`
        $this->dropForeignKey(
            '{{%fk-replies-task_id}}',
            '{{%replies}}'
        );

        // drops index for column `task_id`
        $this->dropIndex(
            '{{%idx-replies-task_id}}',
            '{{%replies}}'
        );

        $this->dropTable('{{%replies}}');
    }
}
