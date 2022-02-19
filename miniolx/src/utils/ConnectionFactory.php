<?php

namespace App\utils;

use \PDO;

class ConnectionFactory
{
    private static  $host = "localhost";
    private static  $db = "miniolx";
    private static  $db_user = "root";
    private static  $db_password = "root";
    private static  $con = NULL;

    public static function getConnection()
    {
        if (!self::$con) {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db;
            self::$con = new PDO($dsn, self::$db_user, self::$db_password, array(PDO::ATTR_PERSISTENT => true));
        }
        return self::$con;
    }
}
