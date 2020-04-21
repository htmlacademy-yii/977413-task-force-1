<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notifications}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%tasks}}`
 */
class m200421_131943_create_notifications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notifications}}', [
            'id' => $this->primaryKey(),
            'notification' => $this->string(),
            'recipient_id' => $this->integer(),
            'task_id' => $this->integer(),
            'dt_add' => $this->dateTime()
        ]);

        // creates index for column `recipient_id`
        $this->createIndex(
            '{{%idx-notifications-recipient_id}}',
            '{{%notifications}}',
            'recipient_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-notifications-recipient_id}}',
            '{{%notifications}}',
            'recipient_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `task_id`
        $this->createIndex(
            '{{%idx-notifications-task_id}}',
            '{{%notifications}}',
            'task_id'
        );

        // add foreign key for table `{{%tasks}}`
        $this->addForeignKey(
            '{{%fk-notifications-task_id}}',
            '{{%notifications}}',
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
            '{{%fk-notifications-recipient_id}}',
            '{{%notifications}}'
        );

        // drops index for column `recipient_id`
        $this->dropIndex(
            '{{%idx-notifications-recipient_id}}',
            '{{%notifications}}'
        );

        // drops foreign key for table `{{%tasks}}`
        $this->dropForeignKey(
            '{{%fk-notifications-task_id}}',
            '{{%notifications}}'
        );

        // drops index for column `task_id`
        $this->dropIndex(
            '{{%idx-notifications-task_id}}',
            '{{%notifications}}'
        );

        $this->dropTable('{{%notifications}}');
    }
}
