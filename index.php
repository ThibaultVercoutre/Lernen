<?php session_start();

    $_SESSION['pseudo'] = '';
    $_SESSION['email'] = '';
    $_SESSION['password'] = '';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
	<title>Lernen - Inscription</title>
	<link rel="stylesheet" href="CSS/style_connexion.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <div class="container">
        <div class="cube">
            <form method="POST" id="form_inscription">
                <p>Bienvenue</p>
                <input type="text" name="pseudo" id="pseudo" placeholder="Entrez votre pseudo">
                <input type="text" name="email" id="email" placeholder="Entrez votre email">
                <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe">
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirmez votre mot de passe">
                <input type="submit" name="inscription" id="inscription" value="Inscription">
                <!-- <div class="return">Se connecter
                    <span class="material-symbols-outlined">arrow_forward</span></div> -->
            </form>

            <form method="POST" id="form_connexion">
                <p>Bienvenue</p>
                <input type="text" name="email" id="email" placeholder="Entrez votre email">
                <input type="text" name="password" id="password" placeholder="Entrez votre mot de passe">
                <input type="submit" name="connexion" id="connexion" value="Connexion">
                <!-- <div class="return">S'incrire
                    <span class="material-symbols-outlined">arrow_forward</span></div> -->
            </form>
        </div>
    </div>

        <?php
            include 'includes/database.php';
            global $db;

            include 'includes/inscription.php';
            include 'includes/connexion.php';    
        ?>
</body>
</html>