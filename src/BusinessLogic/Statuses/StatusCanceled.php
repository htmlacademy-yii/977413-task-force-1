<?php

namespace HtmlAcademy\BusinessLogic\Statuses;

class StatusCanceled extends AbstractClassStatus
{
    public static function getStatusName(): string
    {
        return 'Отменено';
    }

    protected $availableActions = [];
}
