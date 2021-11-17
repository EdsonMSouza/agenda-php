<?php

namespace Agenda\Database;

use PDO;

class Database
{
    # Connection instance
    private static $db;

    # PDO config vars
    private static $db_type = 'mysql';
    private static $db_hostname = 'localhost';
    private static $db_name = 'agenda';
    private static $db_user = '';
    private static $db_password = '';

    # Constructor
    /**
     * @var null
     */
    #private $conn;

    function __construct()
    {
        self::$db = new PDO(
            self::$db_type . ":host=" .
            self::$db_hostname . ";dbname=" .
            self::$db_name ,
            self::$db_user ,
            self::$db_password
        );
        self::$db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        self::$db->setAttribute(PDO::ATTR_PERSISTENT , FALSE);
        self::$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , "SET NAMES utf-8");
        self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES , false);
        self::$db->exec("SET NAMES utf8");
    }

    # Crate a new connection if not exist
    public static function connection(): PDO
    {
        if(!self::$db) {
            new Database();
        }
        return self::$db;
    }
}