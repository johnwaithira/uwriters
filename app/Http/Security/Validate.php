<?php

namespace User\Uwriters\app\Http\Security;

use User\Uwriters\app\core\Request;
use User\Uwriters\app\Http\CSRF;

class Validate
{
    /*
          * @return bool
          */
    public static function csrf()
    {
        $request = new Request();
        if(CSRF::validate($request->inputs()['csrf_token']))
        {
            return true;
        }
        return false;
    }
}