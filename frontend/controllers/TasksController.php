<?php

namespace frontend\controllers;

use frontend\models\Categories;
use frontend\models\Tasks;

class TasksController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $data = Tasks::getAllNewTasks();


        $category_name = Categories::getCategoryName();

        return $this->render('index', ['data' => $data, 'category_name' => $category_name]);
    }
}
