<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string $message
 * @property int $sender_id
 * @property int $recipient_id
 * @property int $task_id
 * @property string|null $dt_add
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message', 'sender_id', 'recipient_id', 'task_id'], 'required'],
            [['sender_id', 'recipient_id', 'task_id'], 'integer'],
            [['dt_add'], 'safe'],
            [['message'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'sender_id' => 'Sender ID',
            'recipient_id' => 'Recipient ID',
            'task_id' => 'Task ID',
            'dt_add' => 'Dt Add',
        ];
    }
}
