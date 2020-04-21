<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%messages}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%users}}`
 * - `{{%tasks}}`
 */
class m200421_131909_create_messages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%messages}}', [
            'id' => $this->primaryKey(),
            'message' => $this->text(),
            'sender_id' => $this->integer(),
            'recipient_id' => $this->integer(),
            'task_id' => $this->integer(),
            'dt_add' => $this->dateTime()
        ]);

        // creates index for column `sender_id`
        $this->createIndex(
            '{{%idx-messages-sender_id}}',
            '{{%messages}}',
            'sender_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-messages-sender_id}}',
            '{{%messages}}',
            'sender_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recipient_id`
        $this->createIndex(
            '{{%idx-messages-recipient_id}}',
            '{{%messages}}',
            'recipient_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-messages-recipient_id}}',
            '{{%messages}}',
            'recipient_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `task_id`
        $this->createIndex(
            '{{%idx-messages-task_id}}',
            '{{%messages}}',
            'task_id'
        );

        // add foreign key for table `{{%tasks}}`
        $this->addForeignKey(
            '{{%fk-messages-task_id}}',
            '{{%messages}}',
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
            '{{%fk-messages-sender_id}}',
            '{{%messages}}'
        );

        // drops index for column `sender_id`
        $this->dropIndex(
            '{{%idx-messages-sender_id}}',
            '{{%messages}}'
        );

        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-messages-recipient_id}}',
            '{{%messages}}'
        );

        // drops index for column `recipient_id`
        $this->dropIndex(
            '{{%idx-messages-recipient_id}}',
            '{{%messages}}'
        );

        // drops foreign key for table `{{%tasks}}`
        $this->dropForeignKey(
            '{{%fk-messages-task_id}}',
            '{{%messages}}'
        );

        // drops index for column `task_id`
        $this->dropIndex(
            '{{%idx-messages-task_id}}',
            '{{%messages}}'
        );

        $this->dropTable('{{%messages}}');
    }
}
