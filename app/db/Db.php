<?php

namespace App\Db;

class Db
{
    protected static $dsn = 'mysql:dbname=agro;host=127.0.0.1';
    protected static $user = 'Joker';
    protected static $password = 'Footboll777';
    protected static $connect = null;

     public static function connect()
     {
         if (self::$connect != null) {
             return self::$connect;
         } else {
             try {
                 return self::$connect = new \PDO(self::$dsn, self::$user, self::$password);
             } catch (\PDOException $e) {
                 echo 'Подключение не удалось: ' . $e->getMessage();
             }
         }
     }
}