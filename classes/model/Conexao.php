<?php
namespace classes\model;
class Conexao
{
    static $con;
    public static function conectar()
    {
        if (!isset(self::$con)) {
        self::$con = new \PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
        self::$con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return self::$con;
    }
}
