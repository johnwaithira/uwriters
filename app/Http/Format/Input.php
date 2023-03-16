<?php

namespace User\Uwriters\app\Http\Format;

class Input
{
    public static function ImplodeComma($param = [])
    {
        return implode(", ", $param);
    }
}