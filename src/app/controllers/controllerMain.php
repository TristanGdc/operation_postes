<?php

/** 
 * This is a PHP controller class to handle user general actions
**/

include 'config.php';

class ControllerMain {

    //Method to display homepage
    public static function home(){
        include 'config.php';
        $view = $root . 'app/views/home/viewHome.php';
        require($view);
    }
}    