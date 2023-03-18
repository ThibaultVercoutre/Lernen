<?php   

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
	<title>Lernen - Home</title>
	<link rel="stylesheet" href="CSS/style_index.css">
</head>
<body>
    <header>
        <h1>Lernen</h1>
        <nav id="interact">
            <ul>
                <li id="home">Home<div></div></li>
                <li id="compte">Compte<div></div></li>
                <li id="add_cours">Ajouter Cours<div></div></li>
                <li id="add_question">Ajouter questions<div></div></li>
                <li id="deconnexion">Déconnexion<div></div></li>
            </ul>
        </nav>
    </header>
    <div id="pages">
        <section class="page" id="search">
            <input type="text" id="input_matiere" placeholder="Entrez votre matière à réviser">
            <div id="liste_matiere">
                <?php
                include 'includes/database.php';
                global $db;
                include 'includes/liste_matiere.php';
                ?>
            </div>
        </section>
        <section class="page" id="p_compte"></section>
        <section class="page" id="p_add_cours">
            <input type="text" name="matiere" id="matiere" placeholder="Matière">
            <input type="button" id="b_add_matiere" value="Ajouter">
        </section>
        <section class="page" id="p_add_question">
            <input type="text" name="question" id="question" placeholder="Question">
            <select name="matiere" id="matiere_select">
                <?php
                    include 'includes/option_matiere.php';
                ?>
            </select>
            <input type="button" id="b_add_question" value="Ajouter">
        </section>
    </div>
    <footer>
        <p>© 2018 - Nom de l'auteur</p>
    </footer>
</body>
    <script src="script_index.js"></script>
</html>