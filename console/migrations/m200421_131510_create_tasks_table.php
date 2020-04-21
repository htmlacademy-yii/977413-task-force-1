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

        // creates index for column `author_id`
        $this->createIndex(
            '{{%idx-tasks-author_id}}',
            '{{%tasks}}',
            'author_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-tasks-author_id}}',
            '{{%tasks}}',
            'author_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-tasks-category_id}}',
            '{{%tasks}}',
            'category_id'
        );

        // add foreign key for table `{{%categories}}`
        $this->addForeignKey(
            '{{%fk-tasks-category_id}}',
            '{{%tasks}}',
            'category_id',
            '{{%categories}}',
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
            '{{%fk-tasks-author_id}}',
            '{{%tasks}}'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            '{{%idx-tasks-author_id}}',
            '{{%tasks}}'
        );

        // drops foreign key for table `{{%categories}}`
        $this->dropForeignKey(
            '{{%fk-tasks-category_id}}',
            '{{%tasks}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-tasks-category_id}}',
            '{{%tasks}}'
        );

        $this->dropTable('{{%tasks}}');
    }
}
