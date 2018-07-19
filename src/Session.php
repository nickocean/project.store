<?php

namespace Src\Session;

class Session
{
    private static $isStarted = false;

    public static function start()
    {
        if (self::$isStarted == false) {
            session_start();
            self::$isStarted = true;
        }
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }

    public static function display()
    {
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
    }

    public static function destroy()
    {
        if (self::$isStarted == true) {
            session_unset();
            session_destroy();
        }
    }
}