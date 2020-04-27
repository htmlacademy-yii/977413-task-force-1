<?php

namespace frontend\controllers;

use frontend\models\Users;

class UsersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $workers = Users::getAllWorkers();

        return $this->render('index', ['workers' => $workers]);
    }
}
