<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\Exceptions\UndefinedActionException;
use HtmlAcademy\BusinessLogic\CancelAction;
use HtmlAcademy\BusinessLogic\DoneAction;
use HtmlAcademy\BusinessLogic\RespondAction;
use HtmlAcademy\BusinessLogic\RefuseAction;

require_once './vendor/autoload.php';

class AvailableActions
{
    public $currentStatus;
    public $customer_id;
    public $worker_id;
    public $finish_date;

    CONST STATUS_NEW = 1;
    CONST STATUS_CANCELED = 0;
    CONST STATUS_IN_WORK = 10;
    CONST STATUS_DONE = 200;
    CONST STATUS_FAILED = 404;

    CONST ACTION_RESPOND = 10;
    CONST ACTION_CANCEL = 0;
    CONST ACTION_DONE = 200;
    CONST ACTION_REFUSE = 404;

    CONST ROLE_ADMIN = 3;
    CONST ROLE_USER = 2;
    CONST ROLE_GUEST = 1;

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

    public function getAllActions(): array
    {
        return [
            self::ACTION_RESPOND => 'Откликнуться',
            self::ACTION_CANCEL => 'Отменить',
            self::ACTION_DONE => 'Выполнено',
            self::ACTION_REFUSE => 'Отказаться',
        ];
    }

    //
//    public function getAllRoles() : array
//    {
//      return [
//        self::ROLE_ADMIN => 'Администратор',
//        self::ROLE_USER => 'Пользователь',
//        self::ROLE_GUEST => 'Гость',
//      ];
//    }
//    ];

    public function nextStatus(AbstractClassAction $action): int ///  здесь нужно передавать название класса-действия?
    {
        if (!array_key_exists($action::returnActionName(), $this->getAllActions())) {
            throw new UndefinedActionException();
        }
        switch ($action::returnActionName()) {
            case self::ACTION_CANCEL:
                return self::STATUS_CANCELED;
                break;
            case self::ACTION_DONE:
                return self::STATUS_DONE;
                break;
            case self::ACTION_REFUSE:
                return self::STATUS_FAILED;
                break;
            case self::ACTION_RESPOND:
                return self::STATUS_IN_WORK;
                break;
        }
    }

    public function getAvailableActions(string $role, int $id): int // ещё делаю...
    {

    }
}
