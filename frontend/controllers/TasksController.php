<?php

namespace frontend\controllers;

use frontend\models\Categories;
use frontend\models\TaskForm;
use frontend\models\Tasks;

class TasksController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $categories = Categories::getAllForDropdown();

        $model = new TaskForm();
        if($model->load(\Yii::$app->request->post())) {
            if($model->validate()) {
                $model->applyFilters();
//                var_dump($model->attributes);
//                exit();
            } else {
                var_dump($model->errors);
                exit();
            }
        }

        $data = $model->getTasks();

        return $this->render('index', ['data' => $data, 'model' => $model, 'categories' => $categories]);
    }
}