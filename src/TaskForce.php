<?php

namespace Htmlacademy;

require "vendor/autoload.php";


class StatusException extends Exception
{
    protected $message = 'Такого статуса нету';
}

class Task
{
    public $statusNow;
    public $myAction;
    public $statusNext = [];

    const STATUS_NEW = 1;
    const STATUS_CANCELED = 0;
    const STATUS_IN_WORK = 10;
    const STATUS_DONE = 200;
    const STATUS_FAILED = 404;

    const ACTION_RESPOND = 10;
    const ACTION_CANCEL = 0;
    const ACTION_DONE = 200;
    const ACTION_REFUSE = 404;

    const ROLE_ADMIN = 2;
    const ROLE_USER = 1;
    const ROLE_GUEST = 0;

    public static $statusName = [
        self::STATUS_NEW => 'Новое',
        self::STATUS_CANCELED => 'Отменено',
        self::STATUS_IN_WORK => 'В работе',
        self::STATUS_DONE => 'Выполнено',
        self::STATUS_FAILED => 'Провалено',
    ];

    public static $actionName = [
        self::ACTION_RESPOND => 'Откликнуться',
        self::ACTION_CANCEL => 'Отменить',
        self::ACTION_DONE => 'Выполнено',
        self::ACTION_REFUSE => 'Отказаться',
    ];

    public static $roleName = [
        self::ROLE_ADMIN => 'Администратор',
        self::ROLE_USER => 'Пользователь',
        self::ROLE_GUEST => 'Гость',
    ];

//    public function __construct(?int $statusNow ? $statusNow : $statusName[self::STATUS_NEW]) {
//          if(!in_array($statusNow, self::statusName)) {
//                    throw new StatusException;
//                }
//        $this->statusNow = $statusNow;
//    }

    public function nextStatus(int $myAction,int $statusNow) : int {
        if(!in_array($statusNow, self::statusName)) { /// EXCEPTION
            throw new StatusException;
        }
        if(!in_array($myAction, self::actionName)) { /// EXCEPTION
            throw new StatusException;
        }
        foreach (self::statusName as $status) {
            foreach (self::actionName as $action) {
                if ($statusNow == $status[self::STATUS_NEW]) { /// 1 New
                    switch ($myAction) {
                        case $action[self::ACTION_CANCEL]:
                            return $this->statusNext = $status[self::STATUS_CANCELED];
                            break;
                        case $action[self::ACTION_RESPOND]:
                            return $this->status_next = $status[self::STATUS_IN_WORKING];
                            break;
                    }
                }
                elseif ($statusNow == $status[self::STATUS_IN_WORK]) {   /// 10 'In working'
                    switch ($myAction) {
                        case $action[self::ACTION_DONE]:
                            return $this->status_next = $status[self::STATUS_DONE];
                            break;
                        case $action[self::ACTION_REFUSE]:
                            return $this->status_next = $status[self::STATUS_FAILED];
                            break;
                    }
                }
            }
        }
    }
    public function getStatus() {
        return $this->statusNext;
    }
}

try {
    $task = new Task();
    $task->nextStatus(200, 10);
    echo $task->getStatus();
} catch (StatusException $e) {
    die($e->getMessage());
}
