<?php

require_once 'vendor/autoload.php';

use HtmlAcademy\BusinessLogic\AvailableActions;
use HtmlAcademy\Exceptions\UndefinedActionException;
use HtmlAcademy\BusinessLogic\CancelAction;
try {
    $task = new AvailableActions();

    echo "<pre>";
    print_r($task->getAllActions());
    echo "</pre>";
    echo "<pre>";
    print_r($task->getAllStatuses());
    echo "</pre>";

    print $task->getAllStatuses()[$task->nextStatus(AvailableActions::ACTION_RESPOND)] . '</br>';
    print $task->getAllStatuses()[$task->nextStatus(AvailableActions::ACTION_REFUSE)] . '</br>';
    print $task->getAllStatuses()[$task->nextStatus(AvailableActions::ACTION_DONE)] . '</br>';
    print $task->getAllStatuses()[$task->nextStatus(AvailableActions::ACTION_CANCEL)] . '</br>';
} catch (UndefinedActionException $e) {
    die($e->getMessage());
}

