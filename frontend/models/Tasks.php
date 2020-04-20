<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string|null $dt_add
 * @property int $category_id
 * @property string $description
 * @property string|null $expire
 * @property string $name
 * @property string|null $address
 * @property int|null $budget
 * @property float $lat
 * @property float $lng
 * @property int|null $author_id
 * @property int|null $status
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
            [['category_id', 'description', 'name', 'lat', 'lng'], 'required'],
            [['category_id', 'budget', 'author_id', 'status'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['description', 'name', 'address'], 'string', 'max' => 255],
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
}
