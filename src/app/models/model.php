<?php

/** 
 * This is a PHP model class to connect to database
 * This class is used by all the other Model classes
**/

class Model extends PDO {

    private static $_instance;

    public function __construct() {
    }

    /** 
     * Method to get 'Model' instance
     * (Singleton design pattern)
    **/
    public static function getInstance() {

        //Database credentials are defined in config.php
        include 'controllers/config.php';

        if (!isset(self::$_instance)) {
            self::$_instance = new PDO($dsn, $username, $password);
        }
        return self::$_instance;
    }
}
?>
