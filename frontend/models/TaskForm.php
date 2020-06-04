<?php

namespace frontend\models;

use HtmlAcademy\BusinessLogic\Task;
use Yii;
use yii\base\Model;
use yii\db\ActiveQuery;

/**
 * TaskForm is the model behind the task form.
 */
class TaskForm extends Model
{
    public $categories;
    public $withoutWorker = false;
    public $remote = false;
    public $period;
    public $search;
    /**
     * @var $query ActiveQuery
     */
    private $query;

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->query = Tasks::find()->where(['status' => Task::STATUS_NEW])->orderBy(['dt_add' => SORT_DESC]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['search', 'string'],
            [['categories', 'withoutWorker', 'period', 'search'], 'safe'],
            [['remote', 'withoutWorker'], 'boolean'],
//            ['categories', 'in', 'range' => Categories::find()->column()]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'categories' => 'Категории',
            'withoutWorker' => 'Без исполнителя',
            'remote' => 'Удаленная работа',
            'period' => 'Период',
            'search' => 'Поиск по названию',
        ];
    }

    public function applyFilters()
    {
        $this->query->andFilterWhere(['in', 'category_id', $this->categories]);
        if($this->remote) {
           $this->query->andWhere(['address' => NULL]);
        }
        if($this->withoutWorker) {
            $this->query->andWhere(['replies' => NULL]);
        }
        if ($this->period) {
            $this->query->andFilterWhere(['between', 'expire', date("Y-m-d H:i:s", strtotime('- 1 '. $this->period . 's')), date("Y-m-d H:i:s")]);
        }
        if($this->search) {
            $this->query->andFilterWhere(['like', 'name', $this->search]);
        }
    }

    public function getTasks()
    {
        return $this->query->all();
    }
}