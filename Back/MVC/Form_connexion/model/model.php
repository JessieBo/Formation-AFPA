<?php
require("connect.php");

// Connexion à la BDD
function connect_db()
{
    $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
    try {
        $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $connexion = new PDO($dsn, USER, PASSWD, $option);
    } catch (PDOException $e) {
        printf("Echec connexion : %s\n", $e->getMessage());
        exit();
    }
    return $connexion;
}

function connect() {

    $connexion = connect_db();

    $sql = $connexion->prepare("SELECT * FROM utilisateurs WHERE email_user = :email AND login_user = :username");

    $sql->bindValue(":email", strval($_POST["email"]), PDO::PARAM_STR);
    $sql->bindValue(":username", strval($_POST["username"]), PDO::PARAM_STR);

    $sql->execute();
    $count = $sql->rowCount();
    $data = $sql->fetch();

    if($count > 0) {
        session_start();
        if(!password_verify($_POST['password'], $data['pwd_user'])) {
                $count = 0;
            }
        else {
            $_SESSION['username'] = $data["login_user"];
            $_SESSION['email'] = $data["email_user"];
            $_SESSION['fonction'] = $data["fonction"];
        }
    }

    return  $count;

}

function insert_user()
{
    $connexion = connect_db();
    $sql = "INSERT INTO utilisateurs (email_user, login_user, pwd_user, fonction) VALUES (:email, :username, :mdp, :fonction)";
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $reponse = $connexion->prepare($sql);
    $reponse->bindValue(":email", strval($_POST["email"]), PDO::PARAM_STR);
    $reponse->bindValue(":username", strval($_POST["username"]), PDO::PARAM_STR);
    $reponse->bindValue(":mdp", strval($password), PDO::PARAM_STR);
    $reponse->bindValue(":fonction", strval($_POST["fonction"]), PDO::PARAM_STR);
    $reponse->execute();
}

function controle_doublon() {
    $texte = "";
    $connexion = connect_db();
    $sql = 'SELECT * FROM utilisateurs WHERE email_user = ?';
    $reponse = $connexion->prepare($sql);
    $reponse->execute([$_POST['email']]);
    $count = $reponse->rowCount();

    if($count > 0) {
        $texte = "Ce email est déjà utilisé pour un autre compte";
    } return $texte;
}


