<?php
require ('controllers/controllerMain.php');
require ('controllers/controllerUser.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);
$action = $param['action'];

// --- On supprime l'élément action de la structure
unset($param['action']);

// --- Tout ce qui reste sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
    case "accueil" :
        ControllerMain::$action();
        break;
    case "connexionForm" :
    case "connexion" :
    case "inscriptionForm" :
    case "inscription" :
    case "inscrit" :
    case "deconnexion" :
        ControllerUser::$action();
        break;
    default:
        $action = "accueil";
        ControllerMain::$action();
}
?>