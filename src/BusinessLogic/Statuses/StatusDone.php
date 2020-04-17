<?php

namespace HtmlAcademy\BusinessLogic\Statuses;

class StatusDone extends AbstractClassStatus
{
    public static function getStatusName(): string
    {
        return 'Выполнено';
    }

    protected $availableActions = [];
}
