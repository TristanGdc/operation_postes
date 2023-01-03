<?php

/** 
 * This is a PHP router file to distribute user actions to the right controller
**/

//Import all controllers
require ('controllers/controllerMain.php');
require ('controllers/controllerUser.php');

//Retrieve action in URL
$query_string = $_SERVER['QUERY_STRING'];

//Create a hash table
parse_str($query_string, $param);

//$action is the static method
$action = htmlspecialchars($param["action"]);
$action = $param['action'];

//Remove action from the hash table
unset($param['action']);

//Everything remaming is the potential parameters
$args = $param;

//Authorized methods list
switch ($action) {
    case "home" :
        ControllerMain::$action();
        break;
    case "loginForm" :
    case "login" :
    case "registerForm" :
    case "register" :
    case "registered" :
    case "logout" :
        ControllerUser::$action($args);
        break;
    default:
        $action = "home";
        ControllerMain::$action();
}
?>