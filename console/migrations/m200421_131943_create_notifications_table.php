<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notifications}}`.
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
            'notification' => $this->string()->notNull(),
            'recipient_id' => $this->integer()->notNull(),
            'task_id' => $this->integer()->notNull(),
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
