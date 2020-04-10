<?php

namespace HtmlAcademy\BusinessLogic\Statuses;

use HtmlAcademy\BusinessLogic\Actions\CancelAction;
use HtmlAcademy\BusinessLogic\Actions\RespondAction;

class StatusNew extends AbstractClassStatus
{
    public static function getStatusName(): string
    {
        return 'Новое';
    }

    protected $availableActions = [RespondAction::class, CancelAction::class];
}
