<?php


namespace frontend\models;


use HtmlAcademy\BusinessLogic\Task;
use yii\db\ActiveQuery;

class WorkerForm extends \yii\base\Model
{
    public $categories;
    public $search;
    public $free = false;
    public $online = false;
    public $haveReviews = false;
    /**
     * @var $query ActiveQuery
     */
    private $query;

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->query = Users::find()->where(['role' => Task::ROLE_WORKER])->orderBy(['dt_add' => SORT_DESC]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['search', 'string'],
            [['categories', 'search'], 'safe'],
            [['free', 'online', 'haveReviews'], 'boolean']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'categories' => 'Категории',
            'free' => 'Сейчас свободен',
            'online' => 'Сейчас онлайн',
            'haveReviews' => 'Есть отзывы',
            'search' => 'Поиск по названию',
        ];
    }

    public function applyFilters()
    {
        $this->query->andFilterWhere(['in', 'categories_id', $this->categories]);
        if ($this->free) {
            $this->query->andWhere(['work_id' => NULL]);
        }
        if ($this->online) {
            $this->query->andWhere(['status' => 1]);
        }
        if ($this->haveReviews) {
            $this->query->joinWith('workerOpinions')
                ->andWhere(['not', ['opinions.user_id' => NULL]]);
        }
        if($this->search) {
            $this->query->andFilterWhere(['like', 'name', $this->search]);
        }
    }

    public function getWorkers()
    {
        return $this->query->all();
    }
}