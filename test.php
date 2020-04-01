<?php

require_once 'vendor/autoload.php';

use HtmlAcademy\BusinessLogic\AvailableActions;
use HtmlAcademy\Exceptions\UndefinedActionException;
use HtmlAcademy\BusinessLogic\CancelAction;
use HtmlAcademy\BusinessLogic\Task;
use HtmlAcademy\BusinessLogic\DoneAction;
use HtmlAcademy\BusinessLogic\RefuseAction;
use HtmlAcademy\BusinessLogic\RespondAction;
use HtmlAcademy\BusinessLogic\Import;
use HtmlAcademy\Exceptions\SourceFileException;
use HtmlAcademy\Exceptions\FileFormatException;
use HtmlAcademy\BusinessLogic\Import;
use HtmlAcademy\BusinessLogic\Converter;

//try {
//    print Task::nextStatus(DoneAction::getClassName());
//} catch (UndefinedActionException $e) {
//    die($e->getMessage());
//}

//print RespondAction::getClassName();
//$import = new Import('data/replies.csv', ['dt_add', 'rate', 'description'], 'replies');
//$import->import();
//echo '<pre>';
//print_r($import->getData());
//echo '</pre>';

//print $import->generateFullSql();
//echo '<pre>';
//print_r($import->getData());
//echo '</pre>';

$data = [
    [
        'csv' => 'data/replies.csv',
        'table' => 'replies',
        'fields' => [
            'dt_add',
            'rate',
            'description',
            'author_id',
            'task_id',
            'salary',
        ],
    ],
    [
        'csv' => 'data/users.csv',
        'table' => 'users',
        'fields' => [
            'email',
            'name',
            'password',
            'dt_add',
            'city',
        ],
    ],
    [
        'csv' => 'data/categories.csv',
        'table' => 'categories',
        'fields' => [
            'name',
            'icon',
        ],
    ],
    [
        'csv' => 'data/cities.csv',
        'table' => 'cities',
        'fields' => [
            'city',
            'lat',
            'lng',
        ],
    ],
    [
        'csv' => 'data/opinions.csv',
        'table' => 'opinions',
        'fields' => [
            'dt_add',
            'rate',
            'description',
            'author_id',
            'user_id',
            'task_id'
        ],
    ],
    [
        'csv' => 'data/profiles.csv',
        'table' => 'profiles',
        'fields' => [
            'address',
            'bd',
            'about',
            'phone',
            'skype',
        ],
    ],
    [
        'csv' => 'data/tasks.csv',
        'table' => 'tasks',
        'fields' => [
            'dt_add',
            'category_id',
            'description',
            'expire',
            'name',
            'address',
            'budget',
            'lat',
            'lng',
            'author_id',
            'status'
        ],
    ],
];

$converter = new Converter($data, new Import());
$converter->doConvertion();

//$file = new SplFileObject("data/replies.csv");
//while (!$file->eof()) {
//    var_dump($file->fgetcsv());
//    echo '<br>';
//}


//$file = new SplFileObject("data/new.txt", "w");
//$written = $file->fwrite("12345");
//echo "В файл записано $written байт";
