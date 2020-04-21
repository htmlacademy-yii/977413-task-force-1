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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%replies}}');
    }
}
