<?php

class Model extends PDO {

    private static $_instance;

    //constructeur : héritage public obligatoire par héritage de PDO
    public function __construct() {
    }

    //singleton
    public static function getInstance() {
        //les variables sont définies dans le fichier config.php
        include 'controllers/config.php';

        if (!isset(self::$_instance)) {
            self::$_instance = new PDO($dsn, $username, $password);
        }
        return self::$_instance;
    }
}
?>
