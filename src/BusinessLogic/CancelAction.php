<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassAction;

require_once './vendor/autoload.php';

class CancelAction extends AbstractClassAction
{
    public static function getActionName()
    {
        return 'Отменить';
    }

    public static function getInteriorName()
    {
        return 'act_cancel';
    }

    public static function RoleCheck($user_id,$task_status,$availability=null)
    {
        if($task_status == 'NEW') {
            if($user_id == 'customer_id') {
                return TRUE;
            }
        }
        return FALSE;
    }
}
