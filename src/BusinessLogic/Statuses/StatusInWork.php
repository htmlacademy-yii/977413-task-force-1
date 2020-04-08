<?php

namespace HtmlAcademy\BusinessLogic\Statuses;

use HtmlAcademy\BusinessLogic\Actions\DoneAction;
use HtmlAcademy\BusinessLogic\Actions\RefuseAction;

class StatusInWork extends AbstractClassStatus
{
    public function getStatusName(): string
    {
        return 'В работе';
    }

    protected $availableActions = [DoneAction::class, RefuseAction::class];
}
