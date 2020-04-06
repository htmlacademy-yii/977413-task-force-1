<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\CancelAction;
use HtmlAcademy\BusinessLogic\DoneAction;
use HtmlAcademy\BusinessLogic\RefuseAction;
use HtmlAcademy\BusinessLogic\RespondAction;
use HtmlAcademy\Exceptions\EmptyActionException;
use HtmlAcademy\Exceptions\EmptyStatusException;
use HtmlAcademy\Exceptions\UndefinedActionException;
use HtmlAcademy\BusinessLogic\AbstractClassAction;
use HtmlAcademy\Exceptions\UndefinedStatusException;

require_once './vendor/autoload.php';

class AvailableActions
{
    private CONST RELATIONS = [
        CancelAction::class => Task::STATUS_CANCELED,
        DoneAction::class => Task::STATUS_DONE,
        RespondAction::class => Task::STATUS_IN_WORK,
        RefuseAction::class => Task::STATUS_FAILED
    ];

    /**
     * создал связи статусов с доступными действиями для них
     */
    private CONST ACTIONS =
        [
            StatusDone::class => NULL,
            StatusInWork::class =>
                [
                    RefuseAction::class,
                    DoneAction::class,
                ],
            StatusFailed::class => NULL,
            StatusCanceled::class => NULL,
            StatusNew::class =>
                [
                    CancelAction::class,
                    RespondAction::class
                ]
        ];


//    public function getAvailableActions(bool $role, int $status): int
//    {
//
//    }

    public static function getStatusAfterAction(AbstractClassAction $action) : int
    {
        $name = $action::getClassName();
        if (empty(self::RELATIONS[$name])) {
            throw new EmptyStatusException();
        }

        return self::RELATIONS[$name];
    }

   // создал метод для получения доступных действий для текущего статуса, пока сделал без ролей
    public static function getActionsFromStatus(AbstractClassStatus $status) : array
    {
        $name = get_class($status);
        if (!$status::canBeChangedTo($status)) {
            throw new EmptyActionException();
        }

        return self::ACTIONS[$name];
    }
}
