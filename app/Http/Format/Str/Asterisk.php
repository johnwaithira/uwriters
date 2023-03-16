<?php

namespace User\Uwriters\app\Http\Format\Str;

class Asterisk
{
    /**
     * @param $text
     * @param $len
     * @return string
     */
    public static function make($text, $len)
    {
        return sprintf('%s****%s',
            substr($text, 0, (int)$len),
            substr($text, -(int)$len)
        );
    }

    /**
     * @param $phone
     * @param $int
     * @return string
     */
    public static function makeDiff($data, $init , $int)
    {
        $asterisks = strlen($data) - ($init + $int);

        return sprintf(
            '%s'.self::gen($asterisks).'%s',
            Str::startsWith(
                $data, $init
            ),
            Str::endsWith(
                $data, $int
            )
        );
    }

    public static function gen($num)
    {
        $val = "";
        for ($i = 0; $i < $num; $i++)
        {
            $val .= "*";
        }
        return $val;
    }
}