<?php

namespace HtmlAcademy\BusinessLogic\Statuses;

class StatusFailed extends AbstractClassStatus
{
    public function getStatusName(): string
    {
        return 'Провалено';
    }

    protected $availableActions = [];
}
