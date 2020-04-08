<?php

namespace HtmlAcademy\BusinessLogic\Statuses;

class StatusCanceled extends AbstractClassStatus
{
    public function getStatusName(): string
    {
        return 'Отменено';
    }

    protected $availableActions = [];
}
