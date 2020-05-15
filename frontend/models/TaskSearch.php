<?php

namespace frontend\models;


use yii\data\ActiveDataProvider;

class TaskSearch extends Tasks
{
public function search(): ActiveDataProvider
{
$query = Tasks::find();

$provider = new ActiveDataProvider([
'query' => $query
]);

return $provider;
}

}