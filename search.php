<?php 

// Continuité de la session
session_start();

// Récupération du template permettant la connexion à la bdd
require 'database_interactions/database.php';

//Requête pour récupérer tous les twitts contenant le mot recherché
$requete = $database->prepare("SELECT * FROM `twitts` INNER JOIN user WHERE twitts.userid = user.user_id AND `content` LIKE '%".$_GET['search']."%' ORDER BY date DESC");
$requete->execute();
$searchTwitts = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Récupération du template "style.php" -->
    <?php require "templates/style.php" ?>

    <title>ReTWITT - Search</title>
</head>
<body>
    <!-- Récupération du template "navbars.php" -->
    <?php require 'templates/navbars.php' ?>

    <!-- Section des posts -->
    <div class="posts">
        <div class="filters">
            <div class="tags-filter filter">
                <div class="tags-menu">Tags <i class="fa-solid fa-chevron-down"></i></div>
            </div>
        </div>
        <!-- Menu de sélection des tags -->
        <div class="tags-content">
            <div class="tag-choice all">All</div>
            <div class="tag-choice voyage">Voyage</div>
            <div class="tag-choice jeu-video">JeuVidéo</div>
            <div class="tag-choice innovation">Innovation</div>
            <div class="tag-choice musique">Musique</div>
            <div class="tag-choice television">Télévision</div>
            <div class="tag-choice animaux">Animaux</div>
            <div class="tag-choice peinture">Peinture</div>
            <div class="tag-choice lecture">Lecture</div>
            <div class="tag-choice sport">Sport</div>
            <div class="tag-choice loisirs">Loisirs</div>
        </div>

        <!-- S'il n'y a aucun post à afficher, on le précise -->
        <?php if(empty($searchTwitts)) { ?>
            <h4>Aucun post ne correspond à votre recherche</h4>
        <?php } ?>

        <!-- Boucle de parcours des posts récupérés grâce à la requête -->
        <?php foreach ($searchTwitts as $twitt) { ?>
            <!-- Mise en page du post -->
            <div class="post <?= $twitt['tag'] ?>">
            <div class="up-post">
                <img class="twitt_user_img" src="<?= $twitt['img'] ?>" alt="Avatar">
                <div class=usernames>
                    <h4 class="userpseudo"><?= $twitt['pseudo'] ?></h4>
                    <h5 class="username">@<?= $twitt['nom'] ?></h5>
                </div>
                <div class="date-publication"><?= $twitt['date'] ?></div>
                <div class="tag <?= $twitt['tag'] ?>">#<?= $twitt['tag'] ?></div>
            </div>
            <hr>
            <div class="post-content"><?= $twitt['content'] ?></div>
            <hr>

            <!-- Si le post appartient à l'utilisateur connecté, on donne la possibilité de supprimer le post -->
            <?php if(isset($_SESSION['user_id']) && $twitt['userid'] == $_SESSION['user_id']) { ?>
            <div class="post-option">
                <form class="del-icon" action="database_interactions/del_post.php" method="post">
                    <input name="id" type="hidden" value="<?= $twitt['id'] ?>">
                    <button class="del-icon"><i class="options fa-regular fa-trash"></i></button>
                </form>
            </div>
            <?php } ?>

        </div>
        <?php } ?>
    </div>
    <!-- On récupère le script JS -->
    <script src="script-retwitt.js"></script>
</body>
</html>