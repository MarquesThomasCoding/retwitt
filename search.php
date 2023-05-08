<?php 

session_start();

require 'database_interactions/database.php';

$requete = $database->prepare("SELECT * FROM `twitts` WHERE `content` LIKE '%".$_GET['search']."%' ORDER BY date DESC");
$requete->execute();
$searchTwitts = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "templates/style.php" ?>
    <title>ReTWITT - Search</title>
</head>
<body>
    <?php require 'templates/navbars.php' ?>
    <div class="posts">
        <div class="filters">
            <div class="tags-filter filter">
                <div class="tags-menu">Tags <i class="fa-solid fa-chevron-down"></i></div>
            </div>
        </div>
        <div class="tags-content">
            <div class="tag-choice" id="all">All</div>
            <div class="tag-choice" id="voyage">Voyage</div>
            <div class="tag-choice" id="jeu-video">JeuVidéo</div>
            <div class="tag-choice" id="innovation">Innovation</div>
            <div class="tag-choice" id="musique">Musique</div>
            <div class="tag-choice" id="television">Télévision</div>
            <div class="tag-choice" id="animaux">Animaux</div>
            <div class="tag-choice" id="peinture">Peinture</div>
            <div class="tag-choice" id="lecture">Lecture</div>
            <div class="tag-choice" id="sport">Sport</div>
            <div class="tag-choice" id="loisirs">Loisirs</div>
        </div>
        <?php if(empty($searchTwitts)) { ?>
            <h4>Aucun post ne correspond à votre recherche</h4>
        <?php } ?>
        <?php foreach ($searchTwitts as $twitt) { ?>
            <div class="post <?= $twitt['tag'] ?>">
            <div class="up-post">
                <div class="date-publication"><?= $twitt['date'] ?></div>
                <div class="tag" id="<?= $twitt['tag'] ?>">#<?= $twitt['tag'] ?></div>
            </div>
            <hr>
            <div class="post-content"><?= $twitt['content'] ?></div>
            <hr>
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
    <script src="script-retwitt.js"></script>
</body>
</html>