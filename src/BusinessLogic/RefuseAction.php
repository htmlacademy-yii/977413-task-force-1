<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassAction;


require_once './vendor/autoload.php';

class RefuseAction extends AbstractClassAction
{
    public static function getActionName()
    {
        return 'Отказаться';
    }

    public static function getInteriorName()
    {
        return 'act_refuse';
    }

    public static function RoleCheck($user_id,$task_status,$availability=null)
    {
        if($task_status == 'IN_WORKING') {
            if($user_id == 'worker_id') {
                return TRUE;
            }
        }
        return FALSE;
    }
}
