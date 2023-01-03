<?php

/** 
 * This is a PHP model class to connect to database and handle request that concern the User database table
**/

require_once $root.'app/models/model.php';

class ModelUser {

    //User database attributes
    private $PK_user_id, $user_email, $user_date_ajout, $user_contact, $user_password, $user_ip;

    //Constructor method used by PDO::FETCH_CLASS
    public function __construct($PK_user_id = NULL, $user_email = NULL, $user_date_ajout = NULL, $user_contact = NULL, $user_password = NULL, $user_ip = NULL) {
        //NULL if undefined
        if (!is_null($PK_user_id)) {
            $this->PK_user_id = $PK_user_id;
            $this->user_email = $user_email;
            $this->user_date_ajout = $user_date_ajout;
            $this->user_contact = $user_contact;
            $this->user_password = $user_password;
            $this->user_ip = $user_ip;
        }
    }

    //Method to get user's password
    function getPassword() {
        return $this->user_password;
    }

    //Method to get user's id
    function getId(){
        return $this->PK_user_id;
    }

    /** 
     * Method to check if a user exists in the database from his email
     * 
     * email : user's email
    **/
    public static function checkExists($email) {
        try {
            $database = Model::getInstance();
            $query = 'SELECT * FROM user WHERE user_email="' . $email .'"';
            $statement = $database->prepare($query);
            $statement->execute();
            $row_count = $statement->rowCount();

            //True if user exists
            return $row_count==1;

        //Debug
        } catch (PDOException $e) {
            // printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    /** 
     * Method to fetch a user from database with his email
     * 
     * email : user's email
    **/
    public static function getUser($email) {
        try {
            $database = Model::getInstance();
            $query = 'SELECT * FROM user WHERE user_email="' . $email .'"';
            $statement = $database->prepare($query);
            $statement->execute();

            //Create a ModelUser entity tab
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUser");

            //Return first (and only) element : the requested user
            return($results[0]);

        //Debug
        } catch (PDOException $e) {
            // printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    /** 
     * Method to register a user in the database
     * 
     * email : user's email
     * password : user's password
     * 
     * We send email, password and IP address to database.
     * Registration date, contact status (default 0 = false), and id (auto-incremented) are automatically generated
    **/
    public static function insert($email, $password){
        try {
            $database = Model::getInstance();
            $password = hash('sha256', $password);

            //User's IP address
            $ip = $_SERVER['REMOTE_ADDR'];

            //Insert into database
            $insert = $database->prepare('INSERT INTO user(user_email, user_password, user_ip) VALUES (:user_email, :user_password, :user_ip)');
            $insert-> execute(array(
                'user_email' => $email,
                'user_password' => $password,
                'user_ip' => $ip
            ));

        //Debug
        } catch (PDOException $e) {
            // printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
