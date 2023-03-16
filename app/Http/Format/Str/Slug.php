<?php

namespace User\Uwriters\app\Http\Format\Str;

class Slug
{
    /**
     * @param $slug
     * @return array|string|null
     */
    public static function make($slug)
    {
        /** @var string $slug */
        return preg_replace(
        /** @lang text */ '/[^a-z0-9]+/i',
            '-', trim(strtolower($slug))
        );
    }
}