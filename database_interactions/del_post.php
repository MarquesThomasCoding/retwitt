<?php 

require 'database.php';

$del_post = $database->prepare('DELETE FROM twitts WHERE id=:id');
$del_post->execute(
    [
        "id"=>$_POST["id"]
    ]
);

header("Location: ../index.php");