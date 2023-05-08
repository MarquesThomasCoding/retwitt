<?php 

session_start();

require 'database.php';

$account_exist = $database->prepare('SELECT * FROM user WHERE mail = :mail');
$account_exist->execute(
    [
        "mail"=>$_POST["email"]
    ]
);

$check=$account_exist->fetchAll(PDO::FETCH_ASSOC);

if($check == false) {
    $add_account = $database->prepare('INSERT INTO user (pseudo, nom, mail, mdp, img) VALUES (:pseudo, :nom, :mail, :mdp, :img)');
    $add_account->execute(
        [
            "pseudo"=>$_POST["pseudo"],
            "nom"=>$_POST["nom"],
            "mail"=>$_POST["email"],
            "mdp"=>$_POST["mdp"],
            "img"=>"https://picsum.photos/200"
        ]
    );
    $recup_account = $database->prepare('SELECT * FROM user WHERE mail = :mail');
    $recup_account->execute(
        [
            "mail"=>$_POST['email']
        ]
    );

    $account=$recup_account->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['user_id'] = $account[0]['user_id'];
    $_SESSION['nom'] = $account[0]['nom'];
    $_SESSION['pseudo'] = $account[0]['pseudo'];
    $_SESSION['email'] = $account[0]['mail'];
    $_SESSION['img'] = $account[0]['img'];
    header("Location: ../index.php");

}

else {
    echo "<h1>Un compte avec cette adresse-mail existe déjà</h1>
    <br>
    <a href='../login.php'>Se connecter</a>
    <a href='..signin.php'>S'inscrire</a>";
}