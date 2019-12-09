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

    CONST ACTION_RESPOND = 10;
    CONST ACTION_CANCEL = 0;
    CONST ACTION_DONE = 200;
    CONST ACTION_REFUSE = 404;

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

    CONST RELATIONS = [
        CancelAction::class => Task::STATUS_CANCELED,
        DoneAction::class => Task::STATUS_DONE,
        RespondAction::class => Task::STATUS_IN_WORK,
        RefuseAction::class => Task::STATUS_FAILED
    ];

//    public function getAllRoles() : array
//    {
//      return [
//        self::ROLE_ADMIN => 'Администратор',
//        self::ROLE_USER => 'Пользователь',
//        self::ROLE_GUEST => 'Гость',
//      ];
//    }


//    public function getAvailableActions(string $role, int $id): int // ещё делаю...
//    {
//        switch ($role) {
//            case self::ROLE_CUSTOMER:
//
//        }
//    }
}
