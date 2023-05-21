<?php 

// Récupération de la session
session_start();

// Récupération du template de connexion à la base de données
require 'database.php';

//Requête pour récupérer le compte de l'utilisateur connecté
$update_account = $database->prepare('UPDATE user SET pseudo=:pseudo, nom=:nom, mail=:mail, mdp=:mdp WHERE user_id = :user_id');
$update_account->execute(
    [
        "pseudo"=>$_POST["pseudo"],
        "nom"=>$_POST["nom"],
        "mail"=>$_POST["mail"],
        "mdp"=>$_POST["mdp"],
        "user_id"=>$_SESSION["user_id"]
    ]
);

// Redirection vers la page profil de l'utilisateur
header("Location: ../profile.php?id_user=".$_SESSION['user_id']);