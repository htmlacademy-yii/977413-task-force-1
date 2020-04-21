<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property string|null $city
 * @property float|null $lat
 * @property float|null $lng
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lat', 'lng'], 'number'],
            [['city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'lat' => 'Lat',
            'lng' => 'Lng',
        ];
    }
}
