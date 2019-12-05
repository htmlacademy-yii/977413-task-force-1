<?php

namespace HtmlAcademy\BusinessLogic;

require_once './vendor/autoload.php';

abstract class AbstractClassAction
{
    abstract public static function getActionName() : string;
    abstract public static function getInteriorName() : string;
    abstract public static function RoleCheck(int $user_id,string $task_status,bool $availability=null) : bool;
//    $availability - доступность для исполнителя откликаться на задание, ёе может не быть, потому что заказчик уже
//    1 раз отказал ему
}
