<?php

namespace HtmlAcademy\BusinessLogic\Statuses;

class StatusDone extends AbstractClassStatus
{
    public function getStatusName(): string
    {
        return 'Выполнено';
    }

    protected $availableActions = [];
}
