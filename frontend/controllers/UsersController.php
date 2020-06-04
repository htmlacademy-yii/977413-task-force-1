<?php

namespace frontend\controllers;

use frontend\models\Categories;
use frontend\models\Users;
use frontend\models\WorkerForm;

class UsersController extends \yii\web\Controller
{
    public function actionIndex()
    {


        $categories = Categories::getAllForDropdown();

        $model = new WorkerForm();

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

        $workers = $model->getWorkers();

        return $this->render('index', ['workers' => $workers, 'categories' => $categories, 'model' => $model]);
    }
}