<?php

namespace HtmlAcademy\BusinessLogic\Statuses;

class StatusFailed extends AbstractClassStatus
{
    public static function getStatusName(): string
    {
        return 'Провалено';
    }

    protected $availableActions = [];
}
