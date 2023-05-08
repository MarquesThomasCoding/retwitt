<?php 

session_start();

require 'database_interactions/database.php';

$requete = $database->prepare("SELECT * FROM twitts INNER JOIN user WHERE twitts.userid = user.user_id ORDER BY date DESC");
$requete->execute();
$allTwitts = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "templates/style.php" ?>
    <title>ReTWITT - Home</title>
</head>
<body>
    <?php require 'templates/navbars.php' ?>
    <?php if(!isset($_SESSION['user_id'])) { ?>
        <div class="blocked">
            <h2>Log in to see all the posts</h2>
        </div>
    <?php } ?>
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
        <?php if(empty($allTwitts)) { ?>
            <h4>Aucun post à afficher</h4>
        <?php } ?>
        <?php foreach ($allTwitts as $twitt) { ?>
            <div class="post <?= $twitt['tag'] ?>">
            <div class="up-post">
                <img class="twitt_user_img" src="<?= $twitt['img'] ?>">
                <div class=usernames>
                    <h4 class="userpseudo"><?= $twitt['pseudo'] ?></h4>
                    <h5 class="username">@<?= $twitt['nom'] ?></h5>
                </div>
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
    <?php if(isset($_SESSION['user_id'])) { ?>
        <div class="profile-part">
            <div class="profile-card">
                <img src="<?= $_SESSION['img'] ?>">
                <div class="usernames">
                    <h4><?= $_SESSION['pseudo'] ?></h4>
                    <h5 class="username">@<?= $_SESSION['nom'] ?></h5>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="new-post">
        <a class="new-post"><i id ="new-post" class="new-post fa-regular fa-message"></i></a>
    </div>
    <div class="new-post-content">
        <h3>Publier</h3>
        <form class="new-post" action="database_interactions/add_post.php" method="post">
            <select name="tags-select">
                <option id="voyage">voyage</option>
                <option id="jeu-video">jeu-video</option>
                <option id="innovation">innovation</option>
                <option id="musique">musique</option>
                <option id="television">television</option>
                <option id="animaux">animaux</option>
                <option id="peinture">peinture</option>
                <option id="lecture">lecture</option>
                <option id="sport">sport</option>
                <option id="loisirs">loisirs</option>
            </select>
            <textarea name="twitt-content"></textarea>
            <?php if(isset($_SESSION['user_id'])) { ?>
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                <button class="button" type=submit>Publish</button>
        </form>
            <?php } else { ?>
        </form>
        <div class="buttons">
            <button class="button"><a href="signin.php"><i class="fa-solid fa-right-to-bracket"></i> Sign In</a></button>
            <button class="button"><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Log In</a></button>
        </div>
        <?php } ?>
        
    </div>
    <script src="script-retwitt.js"></script>
</body>
</html>