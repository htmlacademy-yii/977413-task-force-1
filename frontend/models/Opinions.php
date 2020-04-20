<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "opinions".
 *
 * @property int $id
 * @property string|null $dt_add
 * @property int $rate
 * @property string $description
 * @property int|null $author_id
 * @property int|null $user_id
 * @property int|null $task_id
 */
class Opinions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opinions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add'], 'safe'],
            [['rate', 'description'], 'required'],
            [['rate', 'author_id', 'user_id', 'task_id'], 'integer'],
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
            'user_id' => 'User ID',
            'task_id' => 'Task ID',
        ];
    }
}
