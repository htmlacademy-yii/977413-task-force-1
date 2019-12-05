<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassAction;

require_once './vendor/autoload.php';

class RespondAction extends AbstractClassAction
{
    public static function getActionName()
    {
        return 'Откликнуться';
    }

    public static function getInteriorName()
    {
        return 'act_respond';
    }

    public static function RoleCheck($user_id,$task_status,$availability=null)
    {
        if($task_status == 'NEW') {
            if($user_id == 'worker_id') {
                if($availability == TRUE) {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }
}
