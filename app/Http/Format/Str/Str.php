<?php

namespace User\Uwriters\app\Http\Format\Str;

class Str
{
    /**
     * @param $data
     * @param $len
     * @return string
     */
    public static function endsWith($data, $len)
    {
        return substr(
            $data,
            -(int)$len
        );
    }

    /**
     * @param $data
     * @param $len
     * @return string
     */
    public static function startsWith($data, $len)
    {
        return substr(
            $data,
            0,
            (int)$len
        );
    }

    /**
     * @param $data
     * @return bool
     */
    public static function get($data)
    {
        return isset($_GET[$data]) && !empty($_GET[$data]);
    }
}