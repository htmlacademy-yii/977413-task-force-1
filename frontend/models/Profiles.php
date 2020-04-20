<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "profiles".
 *
 * @property string $address
 * @property string $bd
 * @property string $about
 * @property int $phone
 * @property string $skype
 */
class Profiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'bd', 'about', 'phone', 'skype'], 'required'],
            [['phone'], 'integer'],
            [['address', 'bd', 'about', 'skype'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'address' => 'Address',
            'bd' => 'Bd',
            'about' => 'About',
            'phone' => 'Phone',
            'skype' => 'Skype',
        ];
    }
}
