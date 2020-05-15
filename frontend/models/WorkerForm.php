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

    public function applyFilters()
    {
        $this->query->andFilterWhere(['in', 'categories', $this->categories]);
//        if($this->remote) {
//            $this->query->andWhere('address IS NULL');
//        }
        //           $this->query->andFilterWhere(['is null', 'address', '']);

//        if ($this->withoutWorker) {
//            $this->query->andWhere('replies IS NULL');
//        }
    }
}