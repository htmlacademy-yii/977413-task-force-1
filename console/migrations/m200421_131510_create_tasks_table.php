<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks}}`.
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
            'description' => $this->text()->notNull(),
            'expire' => $this->dateTime()->notNull(),
            'name' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'budget' => $this->integer()->notNull(),
            'lat' => $this->float()->notNull(),
            'lng' => $this->float()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()
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
