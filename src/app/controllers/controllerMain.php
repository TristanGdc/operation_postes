<?php
include 'config.php';

class ControllerMain {

    //accueil
    public static function accueil(){
        include 'config.php';
        $view = $root . 'app/views/accueil/viewHome.php';
        require($view);
    }
}    