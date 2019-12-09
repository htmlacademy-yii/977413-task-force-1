<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\Exceptions\UndefinedActionException;
use HtmlAcademy\BusinessLogic\AvailableActions;

require_once './vendor/autoload.php';

class Task
{
    CONST STATUS_NEW = 1;
    CONST STATUS_CANCELED = 0;
    CONST STATUS_IN_WORK = 10;
    CONST STATUS_DONE = 200;
    CONST STATUS_FAILED = 404;

    public function getAllStatuses(): array
    {
        return [
            self::STATUS_NEW => 'Новое',
            self::STATUS_CANCELED => 'Отменено',
            self::STATUS_IN_WORK => 'В работе',
            self::STATUS_DONE => 'Выполнено',
            self::STATUS_FAILED => 'Провалено',
        ];
    }

    public function nextStatus($action): int
    {
        if (!in_array($action::getActionName(), AvailableActions::getAllActions())) {
            throw new UndefinedActionException();
        }
        return AvailableActions::RELATIONS[$action::class] ?? '';
    }
}
