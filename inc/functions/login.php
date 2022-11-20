<?php

session_start();
require_once __DIR__ . '/util.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    try {
        $utilisateur = "root";
        $motdepasse = "root";
        $hote = "localhost";
        $port = 3306;
        $moteur = "mysql";
        $bdd = "shortly";
        $pdo = new PDO("$moteur:host=$hote:$port;dbname=$bdd", $utilisateur, $motdepasse, [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]);
    } catch (PDOException) {
        echo "<h1>Erreur de connexion à la base de données</h1>";
        exit();
    }
    // Stockage des valeur entré en input 
    $email = ($_POST['email']);
    $password = md5(($_POST['password']));
    // Stockage des valeur entré dans la bdd
    $emailBdd = "";
    $passwordBdd = "";
    $erreur = "";

    if ($email !== "" && $password !== "") {
        $requete = $pdo->prepare('SELECT * FROM users where email =? and password =?');
        $requete->execute(array($email, $password));
        $user = $requete->fetch();
        if (count($user) > 0) {
            $_SESSION["email"] = $user["email"];
            $_SESSION["role"] = $user["role"];

            echo "<meta http-equiv='refresh' content='0;./dashboard/index.php'/>";
        } else {
            $erreur = "Mauvais login ou mot de passe!";
        }
    }
}
