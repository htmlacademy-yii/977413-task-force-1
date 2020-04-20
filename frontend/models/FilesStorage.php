<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "files_storage".
 *
 * @property int $id
 * @property string|null $file_path
 * @property string|null $file_type
 * @property int|null $task_id
 * @property string|null $dt_add
 */
class FilesStorage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files_storage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id'], 'integer'],
            [['dt_add'], 'safe'],
            [['file_path', 'file_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_path' => 'File Path',
            'file_type' => 'File Type',
            'task_id' => 'Task ID',
            'dt_add' => 'Dt Add',
        ];
    }
}
