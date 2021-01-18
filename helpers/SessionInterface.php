<?php


namespace app\helpers;


interface SessionInterface
{

    public static function getSession() : SessionInterface;

    public function set(string $key, $value) : void;

    public function get(string $key, $default = null);

}