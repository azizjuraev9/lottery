<?php
namespace app\helpers;

class Session implements SessionInterface
{

    private static ?Session $instance = null;

    private function __construct()
    {
        session_start();
    }

    public static function getSession() : Session
    {
        if(self::$instance)
            return self::$instance;

        self::$instance = new self();

        return self::$instance;
    }

    public function set(string $key, $value) : void
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

}