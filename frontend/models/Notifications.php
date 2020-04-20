<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property int $id
 * @property string $notification
 * @property int $recipient_id
 * @property int $task_id
 * @property string|null $dt_add
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notification', 'recipient_id', 'task_id'], 'required'],
            [['recipient_id', 'task_id'], 'integer'],
            [['dt_add'], 'safe'],
            [['notification'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'notification' => 'Notification',
            'recipient_id' => 'Recipient ID',
            'task_id' => 'Task ID',
            'dt_add' => 'Dt Add',
        ];
    }
}
