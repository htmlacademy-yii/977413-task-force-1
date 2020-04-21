<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%opinions}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%users}}`
 * - `{{%tasks}}`
 */
class m200421_131714_create_opinions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%opinions}}', [
            'id' => $this->primaryKey(),
            'dt_add' => $this->dateTime(),
            'rate' => $this->integer(),
            'description' => $this->text(),
            'author_id' => $this->integer(),
            'user_id' => $this->integer(),
            'task_id' => $this->integer(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            '{{%idx-opinions-author_id}}',
            '{{%opinions}}',
            'author_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-opinions-author_id}}',
            '{{%opinions}}',
            'author_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-opinions-user_id}}',
            '{{%opinions}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-opinions-user_id}}',
            '{{%opinions}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `task_id`
        $this->createIndex(
            '{{%idx-opinions-task_id}}',
            '{{%opinions}}',
            'task_id'
        );

        // add foreign key for table `{{%tasks}}`
        $this->addForeignKey(
            '{{%fk-opinions-task_id}}',
            '{{%opinions}}',
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
            '{{%fk-opinions-author_id}}',
            '{{%opinions}}'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            '{{%idx-opinions-author_id}}',
            '{{%opinions}}'
        );

        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-opinions-user_id}}',
            '{{%opinions}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-opinions-user_id}}',
            '{{%opinions}}'
        );

        // drops foreign key for table `{{%tasks}}`
        $this->dropForeignKey(
            '{{%fk-opinions-task_id}}',
            '{{%opinions}}'
        );

        // drops index for column `task_id`
        $this->dropIndex(
            '{{%idx-opinions-task_id}}',
            '{{%opinions}}'
        );

        $this->dropTable('{{%opinions}}');
    }
}
