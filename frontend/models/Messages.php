<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string|null $message
 * @property int|null $sender_id
 * @property int|null $recipient_id
 * @property int|null $task_id
 * @property string|null $dt_add
 *
 * @property Users $recipient
 * @property Users $sender
 * @property Tasks $task
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
            [['message'], 'string'],
            [['sender_id', 'recipient_id', 'task_id'], 'integer'],
            [['dt_add'], 'safe'],
            [['recipient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['recipient_id' => 'id']],
            [['sender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['sender_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['task_id' => 'id']],
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

    /**
     * Gets query for [[Recipient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecipient()
    {
        return $this->hasOne(Users::class, ['id' => 'recipient_id'])->inverseOf('messages');
    }

    /**
     * Gets query for [[Sender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSender()
    {
        return $this->hasOne(Users::class, ['id' => 'sender_id'])->inverseOf('messages');
    }

    /**
     * Gets query for [[Task]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::class, ['id' => 'task_id'])->inverseOf('messages');
    }
}
