<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\CancelAction;
use HtmlAcademy\BusinessLogic\DoneAction;
use HtmlAcademy\BusinessLogic\RefuseAction;
use HtmlAcademy\BusinessLogic\RespondAction;
use HtmlAcademy\Exceptions\UndefinedActionException;
use HtmlAcademy\BusinessLogic\AbstractClassAction;
use HtmlAcademy\Exceptions\UndefinedStatusException;

require_once './vendor/autoload.php';

class AvailableActions
{
//    private CONST RELATIONS = [
//        CancelAction::class => Task::STATUS_CANCELED,
//        DoneAction::class => Task::STATUS_DONE,
//        RespondAction::class => Task::STATUS_IN_WORK,
//        RefuseAction::class => Task::STATUS_FAILED
//    ];
//
//    public static function getActionStatus(AbstractClassAction $action) : int
//    {
//        $name = $action::getClassName();
//        if (empty(self::RELATIONS[$name])) {
//            throw new UndefinedStatusException();
//        }
//        return self::RELATIONS[$name];
//    }
}
