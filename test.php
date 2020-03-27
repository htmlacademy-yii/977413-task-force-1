<?php

require_once 'vendor/autoload.php';

use HtmlAcademy\BusinessLogic\AvailableActions;
use HtmlAcademy\Exceptions\UndefinedActionException;
use HtmlAcademy\BusinessLogic\CancelAction;
use HtmlAcademy\BusinessLogic\Task;
use HtmlAcademy\BusinessLogic\DoneAction;
use HtmlAcademy\BusinessLogic\RefuseAction;
use HtmlAcademy\BusinessLogic\RespondAction;
use HtmlAcademy\BusinessLogic\Import;
use HtmlAcademy\Exceptions\SourceFileException;
use HtmlAcademy\Exceptions\FileFormatException;

//try {
//    print Task::nextStatus(DoneAction::getClassName());
//} catch (UndefinedActionException $e) {
//    die($e->getMessage());
//}

//print RespondAction::getClassName();
$import = new Import('data/cities.csv', ['city', 'lat', 'lng'], 'cities');
$import->import();
$import->generateSqlFile();
//print $import->generateFullSql();
//echo '<pre>';
//print_r($import->getData());
//echo '</pre>';
