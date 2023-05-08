<?php 

try {
    $database = new PDO(
        "mysql:host=localhost;dbname=retwitt",
        "root",
        ""
    );
} catch(PDOException $error) {
    die("Echec de connexion à la base de données : $error");
}
?>