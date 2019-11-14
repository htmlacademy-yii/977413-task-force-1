<?php

require_once 'vendor/autoload.php';

use HtmlAcademy\BusinessLogic\Task;
use HtmlAcademy\Exceptions\UndefinedActionException;

try {
    $task = new Task();

    echo "<pre>";
    print_r($task->getAllActions());
    echo "</pre>";
    echo "<pre>";
    print_r($task->getAllStatuses());
    echo "</pre>";

    print $task->getAllStatuses()[$task->nextStatus(Task::ACTION_RESPOND)] . '</br>';
    print $task->getAllStatuses()[$task->nextStatus(Task::ACTION_REFUSE)] . '</br>';
    print $task->getAllStatuses()[$task->nextStatus(Task::ACTION_DONE)] . '</br>';
    print $task->getAllStatuses()[$task->nextStatus(Task::ACTION_CANCEL)] . '</br>';
} catch (UndefinedActionException $e) {
    die($e->getMessage());
}
