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
   }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%notifications}}');
    }
}
