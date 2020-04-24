<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string|null $dt_add
 * @property int $category_id
 * @property string|null $description
 * @property string|null $expire
 * @property string|null $name
 * @property string|null $address
 * @property int|null $budget
 * @property float|null $lat
 * @property float|null $lng
 * @property int $author_id
 * @property int|null $status
 *
 * @property FilesStorage[] $filesStorages
 * @property Messages[] $messages
 * @property Notifications[] $notifications
 * @property Opinions[] $opinions
 * @property Replies[] $replies
 * @property Users $author
 * @property Categories $category
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add', 'expire'], 'safe'],
            [['category_id', 'author_id'], 'required'],
            [['category_id', 'budget', 'author_id', 'status'], 'integer'],
            [['description'], 'string'],
            [['lat', 'lng'], 'number'],
            [['name', 'address'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => 'Category ID',
            'description' => 'Description',
            'expire' => 'Expire',
            'name' => 'Name',
            'address' => 'Address',
            'budget' => 'Budget',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'author_id' => 'Author ID',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[FilesStorages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilesStorages()
    {
        return $this->hasMany(FilesStorage::class, ['task_id' => 'id'])->inverseOf('tasks');
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::class, ['task_id' => 'id'])->inverseOf('tasks');
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::class, ['task_id' => 'id'])->inverseOf('tasks');
    }

    /**
     * Gets query for [[Opinions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOpinions()
    {
        return $this->hasMany(Opinions::class, ['task_id' => 'id'])->inverseOf('tasks');
    }

    /**
     * Gets query for [[Replies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Replies::class, ['task_id' => 'id'])->inverseOf('tasks');
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Users::class, ['id' => 'author_id'])->inverseOf('tasks');
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id'])->inverseOf('tasks');
    }
}
