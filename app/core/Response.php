<?php

namespace User\Uwriters\app\core;

class Response
{
    /**
     * @param $code
     * @return void
     */
    public function setResposeCode($code)
    {
        http_response_code($code);
    }
}