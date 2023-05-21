<!-- HTML -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Récupération du template "style.php" -->
    <?php require "templates/style.php" ?>
    
    <title>ReTWITT - Sign In</title>
</head>
<body class="form-log-sign-body">
    <h1>ReTWITT</h1>
    <div class="form-log-sign">
        <h1>Sign in</h1>

        <!-- Formulaire d'inscription -->
        <form action="database_interactions/add_account.php" method="post">
            <input type="text" name="nom" placeholder="Username" required="required">
            <input type="text" name="pseudo" placeholder="Pseudonyme" required="required">
            <input type="email" name="email" placeholder="Email" required="required">
            <input type="password" name="mdp" placeholder="Password" required="required">
            <button class="button" type="submit"><i class="fa-solid fa-right-to-bracket"></i> Sign in</button>
            <a href="index.php">Home</a>
        </form>

    </div>
</body>
</html>