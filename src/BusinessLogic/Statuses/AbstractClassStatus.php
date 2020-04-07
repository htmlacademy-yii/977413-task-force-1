<?php

namespace HtmlAcademy\BusinessLogic\Statuses;

require_once './vendor/autoload.php';

abstract class AbstractClassStatus
{
    protected $availableActions = [];

    public function getActions() : array
    {
        return $this->availableActions;
    }

    abstract public function getStatusName(): string;

    public function canBeChangedTo(AbstractClassStatus $status) : bool
    {
        if (!isset($status->availableActions)) {
            return FALSE;
        }
        return TRUE;
    }
}
