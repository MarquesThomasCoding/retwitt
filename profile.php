<?php 

session_start();

require 'database_interactions/database.php';

$requete = $database->prepare("SELECT * FROM user WHERE user_id=:user_id");
$requete->execute(
    [
        "user_id"=>$_SESSION['user_id']
    ]
);
$user_info = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "templates/style.php" ?>
    <title>ReTWITT - Profile</title>
</head>
<body>
    <?php require "templates/navbars.php"; ?>
    <div class="profile-card-user">
        <img src="<?= $user_info[0]['img'] ?>" alt="Avatar">
        <div class="infos">
            <form action="database_interactions/update_account.php" class="hidden form-log-sign" method="post">
                <input type="text" name="pseudo" value="<?= $user_info[0]['pseudo'] ?>" placeholder="Pseudonyme" required="required">
                <input type="text" name="nom" value="<?= $user_info[0]['nom'] ?>" placeholder="Username" required="required">
                <input type="email" name="mail" value="<?= $user_info[0]['mail'] ?>" placeholder="Adresse-mail" required="required">
                <input type="password" name="mdp" placeholder="Password" required="required">
                <button type="submit" class="button">Submit</button>
            </form>
            <p>
                <u>Pseudonyme :</u> <?= $user_info[0]['pseudo'] ?>
                <br><br><br>
                <u>Username :</u> <?= $user_info[0]['nom'] ?>
                <br><br><br>
                <u>Email Address :</u> <?= $user_info[0]['mail'] ?>
            </p>
            <button onclick="updateButton()" class="button modif-button" id="update">Modifier</button>
        </div>
    </div>
    <script src="profile.js"></script>
</body>
</html>