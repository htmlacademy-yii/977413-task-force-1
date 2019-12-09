<?php

require_once 'vendor/autoload.php';

use HtmlAcademy\BusinessLogic\AvailableActions;
use HtmlAcademy\Exceptions\UndefinedActionException;
use HtmlAcademy\BusinessLogic\CancelAction;
use HtmlAcademy\BusinessLogic\Task;
use HtmlAcademy\BusinessLogic\DoneAction;
use HtmlAcademy\BusinessLogic\RefuseAction;
use HtmlAcademy\BusinessLogic\RespondAction;

try {
    $task = new Task();

    echo "<pre>";
    print_r($task->getAllStatuses());
    echo "</pre>";

    print $task->getAllStatuses()[$task->nextStatus(RespondAction::class)] . '</br>';
} catch (UndefinedActionException $e) {
    die($e->getMessage());
}

