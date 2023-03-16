<?php

namespace User\Uwriters\app\Http\Security;

class Hash
{
    /**
     * @param $data
     * @return string
     */
    public static function make($data): string
    {
        return Cipher::Encrypt($data);
    }

    /**
     * @param $data
     * @return bool|string
     */
    public static function decrypt($data): bool|string
    {
        return Cipher::Decrypt($data);
    }
}