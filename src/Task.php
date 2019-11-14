<?php

namespace HtmlAcademy;

use HtmlAcademy\UndefinedActionException;

require_once './vendor/autoload.php';

class Task
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

    CONST ROLE_ADMIN = 2;
    CONST ROLE_USER = 1;
    CONST ROLE_GUEST = 0;

    public function getAllStatuses()
    {
        return [
            self::STATUS_NEW => 'Новое',
            self::STATUS_CANCELED => 'Отменено',
            self::STATUS_IN_WORK => 'В работе',
            self::STATUS_DONE => 'Выполнено',
            self::STATUS_FAILED => 'Провалено',
        ];
    }

    public function getAllActions()
    {
        return [
            self::ACTION_RESPOND => 'Откликнуться',
            self::ACTION_CANCEL => 'Отменить',
            self::ACTION_DONE => 'Выполнено',
            self::ACTION_REFUSE => 'Отказаться',
        ];
    }

    //
//    public function getAllRoles()
//    {
//      return [
//        self::ROLE_ADMIN => 'Администратор',
//        self::ROLE_USER => 'Пользователь',
//        self::ROLE_GUEST => 'Гость',
//      ];
//    }
//    ];

    public function nextStatus(int $action) : int {
        if(!array_key_exists($action, $this->getAllActions())) {
            throw new UndefinedActionException();
        }
        switch ($action) {
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
}
