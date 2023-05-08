<?php 

session_start();

require 'database.php';

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

header("Location: ../profile.php");