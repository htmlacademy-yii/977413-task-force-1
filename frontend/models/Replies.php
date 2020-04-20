<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "replies".
 *
 * @property int $id
 * @property string|null $dt_add
 * @property int $rate
 * @property string|null $description
 * @property int|null $author_id
 * @property int|null $task_id
 * @property float|null $salary
 */
class Replies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'replies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add'], 'safe'],
            [['rate'], 'required'],
            [['rate', 'author_id', 'task_id'], 'integer'],
            [['salary'], 'number'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dt_add' => 'Dt Add',
            'rate' => 'Rate',
            'description' => 'Description',
            'author_id' => 'Author ID',
            'task_id' => 'Task ID',
            'salary' => 'Salary',
        ];
    }
}
