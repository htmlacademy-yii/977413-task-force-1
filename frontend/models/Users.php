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
            [['email', 'name', 'password', 'city'], 'string', 'max' => 255, 'required'],
            [['name'], 'unique']
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
    public function getRecipientMessages()
    {
        return $this->hasMany(Messages::class, ['recipient_id' => 'id']);
    }

    /**
     * Gets query for [[Messages0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSenderMessages()
    {
        return $this->hasMany(Messages::class, ['sender_id' => 'id'])->inverseOf('users');
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::class, ['recipient_id' => 'id'])->inverseOf('users');
    }

    /**
     * Gets query for [[Opinions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOpinions()
    {
        return $this->hasMany(Opinions::class, ['author_id' => 'id'])->inverseOf('users');
    }

    /**
     * Gets query for [[Opinions0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkerOpinions()
    {
        return $this->hasMany(Opinions::class, ['user_id' => 'id'])->inverseOf('users');
    }

    /**
     * Gets query for [[Replies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Replies::class, ['author_id' => 'id'])->inverseOf('users');
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::class, ['author_id' => 'id'])->inverseOf('users');
    }
}