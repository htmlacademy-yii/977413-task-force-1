<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\CancelAction;
use HtmlAcademy\BusinessLogic\DoneAction;
use HtmlAcademy\BusinessLogic\RefuseAction;
use HtmlAcademy\BusinessLogic\RespondAction;
use HtmlAcademy\Exceptions\UndefinedActionException;
use HtmlAcademy\BusinessLogic\AbstractClassAction;

require_once './vendor/autoload.php';

class AvailableActions
{
    CONST RELATIONS = [
        CancelAction::class => Task::STATUS_CANCELED,
        DoneAction::class => Task::STATUS_DONE,
        RespondAction::class => Task::STATUS_IN_WORK,
        RefuseAction::class => Task::STATUS_FAILED
    ];

//    public function getAvailableActions(bool $role, int $status): int
//    {
//    
//    }

}



//
//
