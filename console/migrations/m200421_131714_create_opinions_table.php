<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%opinions}}`.
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
            'rate' => $this->integer()->notNull(),
            'description' => $this->text(),
            'author_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'task_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%opinions}}');
    }
}
