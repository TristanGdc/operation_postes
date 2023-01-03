<?php

/** 
 * This is a PHP controller class to handle user actions that concern authentication
**/

include 'config.php';

//Import modelUser to access database methods that concern authentication
require_once $root.'app/models/modelUser.php';

class ControllerUser {

    /** 
     * Method to display register form
     * 
     * args : arguments passed by the router (including a potential error message)
    **/
    public static function registerForm($args){
        include 'config.php';
        if(!isset($_SESSION)) {session_start();}

        //Check if user isn't already logged in
        if(!isset($_SESSION['PK_user_id'])){

            //Register form location
            $view = $root . 'app/views/authentication/viewRegisterForm.php';
            require($view);

        //If already logged in
        }else{ 
            header('Location:router.php?action=home');
        }
    }

    //Method to register user (handle the register form content)
    public static function register(){
        include 'config.php';
        if(!isset($_SESSION)) {session_start();}

        //Check if user isn't already logged in
        if(!isset($_SESSION['PK_user_id'])){

            //Check is the form is filled entirely
            if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])){
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $password_retype = htmlspecialchars($_POST['password_retype']);

                //Check if the email isn't already in the database
                if(!ModelUser::checkExists($email)){

                    //Check if the mail character length is <50
                    if(strlen($email) <= 50){

                        //Check if the mail format is valid
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                            //Check if the passwords match
                            if($password == $password_retype){

                                ModelUser::insert($email, $password);
                                header('Location:router.php?action=registered');
                            
                            //If the passwords don't match
                            }else header('Location:router.php?action=registerForm&error=wrong-password-retype');
                        
                        //If the mail format isn't valid
                        }else header('Location:router.php?action=registerForm&error=email-format');

                    //If the mail is too long
                    }else header('Location:router.php?action=registerForm&error=long-email');

                //If the mail is already in use
                }else header('Location:router.php?action=registerForm&error=existing-email');

            //If the form isn't entirely filled
            }else header('Location:router.php?action=registerForm&error=empty-field');

        //If the user's already logged in
        }else header('Location:router.php?action=home');
    }

    //Method to display the registration validation page
    public static function registered(){
        include 'config.php';
        if(!isset($_SESSION)) {session_start();}

        //Check if the user isn't already logged in
        if(!isset($_SESSION['PK_user_id'])){

            //Validation page location
            $view = $root . 'app/views/authentication/viewRegistered.php';
            require($view);

        //If the user's already logged in
        }else{
            header('Location:router.php?action=home');
        }
    }

    /** 
     * Method to display login form
     * 
     * args : arguments passed by the router (including a potential error message)
    **/
    public static function loginForm($args){
        include 'config.php';
        if(!isset($_SESSION)) {session_start();}

        //Check if the user isn't already logged in
        if(!isset($_SESSION['PK_user_id'])){

            //Login form location
            $view = $root . 'app/views/authentication/viewLoginForm.php';
            require($view);

        //If the user's already logged in
        }else{
            header('Location:router.php?action=home');
        }
    }

    //Method to log user in (handle the login form content)
    public static function login(){
        include 'config.php';
        if(!isset($_SESSION)) {session_start();}

        //Check if the user isn't already logged in
        if(!isset($_SESSION['PK_user_id'])){

            //Check is the form is filled entirely
            if(isset($_POST['email']) && isset($_POST['password'])){
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);

                //Check if the given email is known from the database
                if(ModelUser::checkExists($email)){
                    $user = ModelUser::getUser($email);
                    //Password given in the form
                    $password = hash('sha256', $password);
                    //Password from database
                    $data_password = $user->getPassword();
                    //Check if passwords match
                    if($password === $data_password){
                    
                        $_SESSION['PK_user_id'] = $user->getId();
                        header('Location:router.php?action=home');
                    
                    //If passwords don't match
                    }else header('Location:router.php?action=loginForm&error=wrong-password');
                
                //If the email is unknown
                } else header('Location:router.php?action=loginForm&error=unknown-email');

            //If the form isn't entirely filled
            }else header('Location:router.php?action=loginForm&error=empty-field');

        //If the user's already logged in
        }else header('Location:router.php?action=home');
    }

    //Method to log user out
    public static function logout(){
        include 'config.php';
        if(!isset($_SESSION)) {session_start();}

        //Logout
        session_destroy();

        header('Location:router.php?action=home');
    }
}
?>