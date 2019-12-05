<?php

namespace HtmlAcademy\BusinessLogic;

require_once './vendor/autoload.php';

abstract class AbstractClassAction
{
    abstract public static function getActionName();
    abstract public static function getInteriorName();
    abstract public static function RoleCheck($user_id,$task_status,$availability=null);
//    $availability - доступность для исполнителя откликаться на задание, ёе может не быть, потому что заказчик уже
//    1 раз отказал ему
}
