<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\Exceptions\EmptyActionException;
use HtmlAcademy\BusinessLogic\Statuses\AbstractClassStatus;

require_once './vendor/autoload.php';

class AvailableActions
{
//    private CONST RELATIONS = [
//        CancelAction::class => Task::STATUS_CANCELED,
//        DoneAction::class => Task::STATUS_DONE,
//        RespondAction::class => Task::STATUS_IN_WORK,
//        RefuseAction::class => Task::STATUS_FAILED
//    ];

   // создал метод для получения доступных действий для текущего статуса, пока сделал без ролей
    public function getActionsFromStatus(AbstractClassStatus $status) : array
    {
        $name = get_class($status);
        if (!$status->canBeChangedTo($status)) {
            throw new EmptyActionException();
        }

        return $status->getActions();
    }
}
