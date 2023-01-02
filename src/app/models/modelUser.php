<?php
require_once $root.'app/models/model.php';

class ModelUser {

    private $PK_user_id, $user_email, $user_date_ajout, $user_contact, $user_password, $user_ip;

    //constructeur utilisé par PDO::FETCH_CLASS
    public function __construct($PK_user_id = NULL, $user_email = NULL, $user_date_ajout = NULL, $user_contact = NULL, $user_password = NULL, $user_ip = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($PK_user_id)) {
            $this->PK_user_id = $PK_user_id;
            $this->user_email = $user_email;
            $this->user_date_ajout = $user_date_ajout;
            $this->user_contact = $user_contact;
            $this->user_password = $user_password;
            $this->user_ip = $user_ip;
        }
    }

    function getPassword() {
        return $this->user_password;
    }

    function getId(){
        return $this->PK_user_id;
    }

    //vérification de l'éxistance d'un utilisateur dans la bdd à partir de son adresse email
    public static function checkExists($email) {
        try {
            $database = Model::getInstance();
            $query = 'SELECT * FROM user WHERE user_email="' . $email .'"';
            $statement = $database->prepare($query);
            $statement->execute();
            $row_count = $statement->rowCount();
            return $row_count==1;
        } catch (PDOException $e) {
            // printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    //retourne un utilisateur à partir de son adresse email
    public static function getUser($email) {
        try {
            $database = Model::getInstance();
            $query = 'SELECT * FROM user WHERE user_email="' . $email .'"';
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUser");

            return($results[0]);
            
        } catch (PDOException $e) {
            // printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    //inscription d'un utilisateur dans la bdd
    //on envoie le mail, le mot de passe chiffré et l'adresse IP
    //la date d'inscription, le statut contact (défaut 0 = false) et l'id (auto-incrémenté) sont générés automatiquement
    public static function insert($email, $password){
        try {
            $database = Model::getInstance();
            $password = hash('sha256', $password);
            $ip = $_SERVER['REMOTE_ADDR'];

            $insert = $database->prepare('INSERT INTO user(user_email, user_password, user_ip) VALUES (:user_email, :user_password, :user_ip)');
            $insert-> execute(array(
                'user_email' => $email,
                'user_password' => $password,
                'user_ip' => $ip
            ));

        } catch (PDOException $e) {
            // printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
