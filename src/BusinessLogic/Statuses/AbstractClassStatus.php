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

    abstract static public function getStatusName(): string;

}
