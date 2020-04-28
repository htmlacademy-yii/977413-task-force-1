<?php

namespace frontend\controllers;

use frontend\models\Tasks;

class TasksController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $data = Tasks::getAllNewTasks();

        return $this->render('index', ['data' => $data]);
    }
}
