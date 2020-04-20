<?php

require_once 'vendor/autoload.php';

use HtmlAcademy\Exceptions\ErrorStatusException;
use HtmlAcademy\Exceptions\ErrorActionException;
use HtmlAcademy\BusinessLogic\Statuses\StatusInWork;
use HtmlAcademy\BusinessLogic\Statuses\StatusDone;
use HtmlAcademy\BusinessLogic\Statuses\StatusFailed;
use HtmlAcademy\BusinessLogic\Statuses\StatusNew;
use HtmlAcademy\BusinessLogic\Statuses\StatusCanceled;
use HtmlAcademy\BusinessLogic\Actions\DoneAction;
use HtmlAcademy\BusinessLogic\Actions\RespondAction;
use HtmlAcademy\BusinessLogic\Actions\RefuseAction;
use HtmlAcademy\BusinessLogic\Actions\CancelAction;

$doneAction = new DoneAction();
$respondAction = new RespondAction();
$refuseAction = new RefuseAction();
$cancelAction = new CancelAction();

$statusDone = new StatusDone();
$statusFailed = new StatusFailed();
$statusCanceled = new StatusCanceled();
$statusInWork = new StatusInWork();
$statusNew = new StatusNew();

assert($doneAction->getActionStatus() == StatusDone::class, new ErrorStatusException());
assert($respondAction->getActionStatus() == StatusInWork::class, new ErrorStatusException());
assert($refuseAction->getActionStatus() == StatusFailed::class, new ErrorStatusException());
assert($cancelAction->getActionStatus() == StatusCanceled::class, new ErrorStatusException());

assert($statusDone->getActions() == [], new ErrorActionException());
assert($statusFailed->getActions() == [], new ErrorActionException());
assert($statusCanceled->getActions() == [], new ErrorActionException());
assert($statusInWork->getActions() == [DoneAction::class, RefuseAction::class], new ErrorActionException('В статуса ' . StatusInWork::class . ' должны быть доступными только два действия - ' . DoneAction::class . ' и ' . RefuseAction::class));
assert($statusNew->getActions() == [RespondAction::class, CancelAction::class], new ErrorActionException('В статуса ' . StatusNew::class . ' должны быть доступными только два действия - ' . RespondAction::class . ' и ' . CancelAction::class));

