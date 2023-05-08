<?php 

session_start();

require 'database.php';

$accounts = $database->prepare('SELECT * FROM user WHERE mail = :mail AND mdp = :mdp');
$accounts->execute(
    [
        "mail"=>$_POST["mail"],
        "mdp"=>$_POST["mdp"]
    ]
);

$check = $accounts->fetchAll(PDO::FETCH_ASSOC);

if($check == true) {
    $_SESSION['user_id'] = $check[0]['user_id'];
    $_SESSION['nom'] = $check[0]['nom'];
    $_SESSION['pseudo'] = $check[0]['pseudo'];
    $_SESSION['email'] = $check[0]['mail'];
    $_SESSION['img'] = $check[0]['img'];
    header("Location: ../index.php");
}

else {
    echo "<p>Uncorrect email or password</p>
    <br>
    <a href='../login.php'>Se connecter</a>
    <a href='..signin.php'>S'inscrire</a>";
}

