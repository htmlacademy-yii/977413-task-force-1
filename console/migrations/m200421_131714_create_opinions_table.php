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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%opinions}}');
    }
}
