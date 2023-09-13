<?php

namespace core;

class Session
{
    public static function put($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function has($key): bool
    {
        return (bool)static::get($key);
    }

    public static function flash($key, $value)
    {
        return $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    public static function unflush(){
        $_SESSION = [];
    }

    public static function destroy(){
        static::unflush();
        session_destroy();

//delete the cookie
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

        header('location: /');
        exit();
    }

}