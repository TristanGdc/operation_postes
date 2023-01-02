<?php
include 'config.php';
require_once $root.'app/models/modelUser.php';

class ControllerUser {

    //inscription (formulaire)
    public static function inscriptionForm($error = ''){
        include 'config.php';
        if(!isset($_SESSION)) {session_start();}
        if(!isset($_SESSION['PK_user_id'])){ //si non-connecté
            $view = $root . 'app/views/authentification/viewRegisterForm.php'; //formulaire d'inscription
            if(!$error == ''){
                $_GET['reg_err'] = $error;
            }
            require($view);
        }else{ //si déjà connecté
            header('Location:router.php?action=accueil');
        }
    }

    //inscription (traitement du formulaire)
    public static function inscription(){
        include 'config.php';
        if(!isset($_SESSION)) {session_start();}
        if(!isset($_SESSION['PK_user_id'])){ //si non-connecté
            if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])){ //si formulaire rempli
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $password_retype = htmlspecialchars($_POST['password_retype']);
                if(!ModelUser::checkExists($email)){ //si le mail est disponible
                    if(strlen($email) <= 50){ //si le mail est assez court
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //si le format du mail est valide
                            if($password == $password_retype){ //si les mots de passe correspondent

                                ModelUser::insert($email, $password);
                                header('Location:router.php?action=inscrit');

                            }else self::inscriptionForm('wrong-password-retype'); //si les mots de passe ne correspondent pas
                        }else self::inscriptionForm('email-format'); //si le format du mail n'est pas valide
                    }else self::inscriptionForm('long-email'); //si le mail est trop long
                }else self::inscriptionForm('existing-email'); //si le mail est déjà utilisé
            }else self::inscriptionForm('empty-field'); //si formulaire non-rempli
        }else header('Location:router.php?action=accueil'); //si déjà connecté
    }

    //inscription (page de validation)
    public static function inscrit(){
        include 'config.php';
        if(!isset($_SESSION)) {session_start();}
        if(!isset($_SESSION['PK_user_id'])){ //si non-connecté
            $view = $root . 'app/views/authentification/viewRegistered.php'; //écran de confirmation d'inscription
            require($view);
        }else{ //si déjà connecté
            header('Location:router.php?action=accueil');
        }
    }

    //connexion (fomulaire)
    public static function connexionForm($error = ''){
        include 'config.php';
        if(!isset($_SESSION)) {session_start();}
        if(!isset($_SESSION['PK_user_id'])){ //si non-connecté
            $view = $root . 'app/views/authentification/viewLoginForm.php'; //formulaire de connexion
            if(!$error == ''){
                $_GET['log_err'] = $error;
            }
            require($view);
        }else{ //si déjà connecté
            header('Location:router.php?action=accueil');
        }
    }

    //connexion (traitement du formulaire)
    public static function connexion(){
        include 'config.php';
        if(!isset($_SESSION)) {session_start();}
        if(!isset($_SESSION['PK_user_id'])){ //si non-connecté
            if(isset($_POST['email']) && isset($_POST['password'])){ //si formulaire rempli
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                if(ModelUser::checkExists($email)){ //si l'utilisateur existe (email)
                    $user = ModelUser::getUser($email);
                    $password = hash('sha256', $password); //mot de passe rempli à la connexion
                    $data_password = $user->getPassword(); //mot de passe de la bdd
                    if($password === $data_password){ //si les mots de passe correspondent
                    
                        $_SESSION['PK_user_id'] = $user->getId(); //connexion
                        header('Location:router.php?action=accueil'); //retour à l'accueil

                    }else self::connexionForm('wrong-password'); //mauvais mot de passe
                } else self::connexionForm('unknown-email'); //utilisateur non existant
            }else self::connexionForm('empty-field'); //formulaire non rempli
        }else header('Location:router.php?action=accueil'); //si déjà connecté
    }

    //deconnexion
    public static function deconnexion(){
        include 'config.php';
        if(!isset($_SESSION)) {
            session_start();
            session_destroy(); //déconnexion
        }
        header('Location:router.php?action=accueil');
    }
}
?>