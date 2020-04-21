<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $name
 * @property string|null $password
 * @property string|null $dt_add
 * @property string|null $city
 *
 * @property Messages[] $messages
 * @property Messages[] $messages0
 * @property Notifications[] $notifications
 * @property Opinions[] $opinions
 * @property Opinions[] $opinions0
 * @property Replies[] $replies
 * @property Tasks[] $tasks
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add'], 'safe'],
            [['email', 'name', 'password', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Name',
            'password' => 'Password',
            'dt_add' => 'Dt Add',
            'city' => 'City',
        ];
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['recipient_id' => 'id']);
    }

    /**
     * Gets query for [[Messages0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages0()
    {
        return $this->hasMany(Messages::className(), ['sender_id' => 'id']);
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::className(), ['recipient_id' => 'id']);
    }

    /**
     * Gets query for [[Opinions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOpinions()
    {
        return $this->hasMany(Opinions::className(), ['author_id' => 'id']);
    }

    /**
     * Gets query for [[Opinions0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOpinions0()
    {
        return $this->hasMany(Opinions::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Replies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Replies::className(), ['author_id' => 'id']);
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['author_id' => 'id']);
    }
}
