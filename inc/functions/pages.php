<?php
session_start();
require_once __DIR__ . '/util.php';

$method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

// Un utlisateur "de base" dont les valeurs seront remplacées
// en cas de POST
$user = [
    "firstname" => "",
    "lastname" => "",
    "email" => "",
    "password" => ""
];
// Le texte de l'erreur, s'il y en a une, après tentative d'ajout
$erreur = "";

// Si le formulaire a été soumis
if ($method == "POST") {
    // Ici, on va traiter le formulaire
    $firstname = filter_input(INPUT_POST, "firstname");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, "password");

    $user = [
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "password" => md5($password)
    ];

    $_SESSION['email'] = $email;
    $_SESSION['role'] = "user";
    // Initilisation du pdo 
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
    // On insert les donnés dans la bdd


    // $requete = 'INSERT INTO users (firstname, lastname, email,password) VALUES (":firstname", ":lastname", ":email",":password")';

    $requete = $pdo->prepare('INSERT INTO users (firstname, lastname, email,password) VALUES ("' . $firstname . '", "' . $lastname . '", "' . $email . '","' . $user['password'] . '")');
    $requete->execute();
    $result = $requete->fetchAll();
}

if (isset($_SESSION['email']))
    echo "<meta http-equiv='refresh' content='0;../../dashboard/index.php'/>";
else
    echo "<meta http-equiv='refresh' content='0;../../signup.php'/>";
