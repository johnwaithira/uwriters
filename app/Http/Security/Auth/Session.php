<?php

namespace User\Uwriters\app\Http\Security\Auth;
session_start();
class Session
{
    /* @return array
     * @author JohnWaithira
     * @version 1.0.0.1
     */
    public static function SESSION()
    {
        return $_SESSION;
    }

    /**
     * @param $session_id
     * @return mixed
     */
    public static function setSession($session_id)
    {
        return $_SESSION['passwift_user'] = $session_id;
    }

    /**
     * @return bool
     */
    public static function checksession()
    {
        return isset($_SESSION['qcash_user']) && !empty($_SESSION['qcash_user']);
    }

    /**
     * @return void
     */
    public static function flush()
    {
        session_destroy();
    }

    /**
     * @return void
     */
    public static function active()
    {
        if(!self::checksession())
        {
            session_destroy();
            header('Location: /');
        }
    }

    /**
     * @param $name
     * @return void
     */
    public static function clean($name)
    {
        unset($_SESSION[$name]);
    }

    /**
     * @param $name
     * @param $params
     * @return array|mixed
     */
    public static function set($name, $params = [])
    {
        return $_SESSION[$name] = $params;
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function get($name)
    {
        return $_SESSION[$name];
    }

    /**
     * @return mixed
     */
    public static function user()
    {
        return Session::get('qcash_user');
    }

}