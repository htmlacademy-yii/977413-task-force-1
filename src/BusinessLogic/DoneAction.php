<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassAction;


require_once './vendor/autoload.php';

class DoneAction extends AbstractClassAction
{
    public static function getActionName()
    {
        return 'Выполнено';
    }

    public static function getInteriorName()
    {
        return 'act_done';
    }

    public static function RoleCheck($user_id,$task_status,$availability=null)
    {
        if($task_status == 'IN_WORKING') {
            if($user_id == 'customer_id') {
                return TRUE;
            }
        }
        return FALSE;
    }
}


