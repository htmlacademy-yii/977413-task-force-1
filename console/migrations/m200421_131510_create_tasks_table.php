<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%categories}}`
 */
class m200421_131510_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tasks}}', [
            'id' => $this->primaryKey(),
            'dt_add' => $this->dateTime(),
            'category_id' => $this->integer()->notNull(),
            'description' => $this->text(),
            'expire' => $this->dateTime(),
            'name' => $this->string(),
            'address' => $this->string(),
            'budget' => $this->integer(),
            'lat' => $this->float(),
            'lng' => $this->float(),
            'author_id' => $this->integer()->notNull(),
            'status' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tasks}}');
    }
}
