<?php

namespace Core;

use App\Config;
use PDO;
use PDOException;

abstract class Model
{
    static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $host = Config::DB_HOST;
            $dbname = Config::DB_NAME;
            $user = Config::DB_USER;
            $password = Config::DB_PASSWORD;

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
                return $db;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}
