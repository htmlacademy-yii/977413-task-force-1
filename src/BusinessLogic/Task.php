<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\Exceptions\UndefinedActionException;
use HtmlAcademy\BusinessLogic\AvailableActions;

require_once './vendor/autoload.php';

class Task
{
    public $currentStatus;
    public $customer_id;
    public $worker_id;
    public $finish_date;

    CONST ACTION_RESPOND = 10;
    CONST ACTION_CANCEL = 0;
    CONST ACTION_DONE = 200;
    CONST ACTION_REFUSE = 404;

    CONST STATUS_NEW = 1;
    CONST STATUS_CANCELED = 0;
    CONST STATUS_IN_WORK = 10;
    CONST STATUS_DONE = 200;
    CONST STATUS_FAILED = 404;

//    CONST ROLE_CUSTOMER = 3;
//    CONST ROLE_WORKER = 2;
//    CONST ROLE_GUEST = 1;

    public static function getAllActions(): array
    {
        return [
            self::ACTION_RESPOND => 'Откликнуться',
            self::ACTION_CANCEL => 'Отменить',
            self::ACTION_DONE => 'Выполнено',
            self::ACTION_REFUSE => 'Отказаться',
        ];
    }

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

//    public function getAllRoles() : array
//    {
//      return [
//        self::ROLE_ADMIN => 'Администратор',
//        self::ROLE_USER => 'Пользователь',
//        self::ROLE_GUEST => 'Гость',
//      ];
//    }

    public static function nextStatus($action): int
    {
        if (!in_array($action::getActionName(), Task::getAllActions())) {
            throw new UndefinedActionException();
        }
        return AvailableActions::RELATIONS[$action] ?? '';
    }
}
