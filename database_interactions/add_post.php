<?php 

require 'database.php';

$add_post = $database->prepare('INSERT INTO twitts (tag, content, userid) VALUES (:tag, :content, :userid)');
$add_post->execute(
    [
        "tag"=>$_POST["tags-select"],
        "content"=>$_POST["twitt-content"],
        "userid"=>$_POST["user_id"]
    ]
);

header("Location: ../index.php");