<?php

require_once 'vendor/autoload.php';

use HtmlAcademy\BusinessLogic\AvailableActions;
use HtmlAcademy\Exceptions\UndefinedActionException;
use HtmlAcademy\BusinessLogic\CancelAction;
use HtmlAcademy\BusinessLogic\Task;
use HtmlAcademy\BusinessLogic\DoneAction;
use HtmlAcademy\BusinessLogic\RefuseAction;
use HtmlAcademy\BusinessLogic\RespondAction;
use HtmlAcademy\BusinessLogic\StatusDone;
use HtmlAcademy\BusinessLogic\AbstractClassAction;
use HtmlAcademy\BusinessLogic\AbstractClassStatus;
use HtmlAcademy\BusinessLogic\StatusNew;
use HtmlAcademy\BusinessLogic\StatusInWork;


var_dump($status = new StatusInWork());

//var_dump(get_class($status));
//echo '<br>';
//var_dump($status::$next);
//echo '<br>';
//


//echo '<br>';
//var_dump(AbstractClassStatus::canBeChangedTo($status));
echo '<pre>';
var_dump(AvailableActions::getActionsFromStatus($status));
echo '</pre>';


//print RespondAction::getClassName();
