<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\Statuses\AbstractClassStatus;
use HtmlAcademy\Exceptions\EmptyActionException;
use HtmlAcademy\Exceptions\EmptyStatusException;
use HtmlAcademy\BusinessLogic\Actions\AbstractClassAction;

require_once './vendor/autoload.php';

class Task
{
//    public function __construct($customer_id)
//    {
//        $this->customer_id = $customer_id;
//        $this->currentStatus = new StatusNew();
//    }

    private $currentStatus;
    private $customer_id;
    private $worker_id; // addWorker()

//    public $finish_date;

    CONST ACTION_RESPOND = 10;
    CONST ACTION_CANCEL = 0;
    CONST ACTION_DONE = 200;
    CONST ACTION_REFUSE = 404;

    CONST STATUS_NEW = 1;
    CONST STATUS_CANCELED = 100;
    CONST STATUS_IN_WORK = 10;
    CONST STATUS_DONE = 200;
    CONST STATUS_FAILED = 404;
//
//    CONST ROLE_CUSTOMER = 3;
//    CONST ROLE_WORKER = 2;
//    CONST ROLE_GUEST = 1;
//
//    private CONST RELATIONS = [
//        CancelAction::class => Task::STATUS_CANCELED,
//        DoneAction::class => Task::STATUS_DONE,
//        RespondAction::class => Task::STATUS_IN_WORK,
//        RefuseAction::class => Task::STATUS_FAILED
//    ];
//
    public static function getAllActions(): array
    {
        return [
            self::ACTION_RESPOND => RespondAction::getActionName(),
            self::ACTION_CANCEL => CancelAction::getActionName(),
            self::ACTION_DONE => DoneAction::getActionName(),
            self::ACTION_REFUSE => RefuseAction::getActionName(),
        ];
    }

    public static function getAllStatuses(): array
    {
        return [
            self::STATUS_NEW => StatusNew::getStatusName(),
            self::STATUS_CANCELED => StatusCanceled::getStatusName(),
            self::STATUS_IN_WORK => StatusInWork::getStatusName(),
            self::STATUS_DONE => StatusDone::getStatusName(),
            self::STATUS_FAILED => StatusFailed::getStatusName(),
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

//    public static function getNextStatus(AbstractClassAction $action): int
//    {
//        if (!in_array($action::getActionName(), Task::getAllActions())) {
//            throw new UndefinedActionException();
//        }
//
//        return AvailableActions::getStatusAfterAction($action);
//    }

    public function getStatusAfterAction(AbstractClassAction $action) : string
    {
        if (empty($action->getActionStatus())) {
            throw new EmptyStatusException();
        }

        return $action->getActionStatus();
    }

    public function getActionsFromStatus(AbstractClassStatus $status) : array
    {
        return $status->getActions();
    }
}
