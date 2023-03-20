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

        <!-- Home -->
        <section class="page" id="search">
            <input type="text" class="input_select" id="input_matiere" placeholder="Entrez votre matière à réviser">
            <div id="liste_matiere">
                <?php
                include 'includes/database.php';
                global $db;
                include 'includes/liste_matiere.php';
                ?>
            </div>
        </section>

        <!-- Compte -->
        <section class="page" id="p_compte"></section>

        <!-- Ajouter Cours -->
        <section class="page" id="p_add_cours">
            <input type="text" name="matiere" class="input_select" id="matiere" placeholder="Matière">
            <input type="button" id="b_add_matiere" value="Ajouter">

            <input type="text" name="chapitre" class="input_select" id="chapitre" placeholder="Chapitre">
            <input type="number" name="n_chapitre" class="input_select" id="n_chapitre" placeholder="Numero Chapitre">
            <select name="matiere" class="input_select" id="matiere_select_chapitre">
                <?php
                    include 'includes/option_matiere.php';
                ?>
            </select>
            <input type="button" id="b_add_chapitre" value="Ajouter">
        </section>

        <!-- Ajouter Questions -->
        <section class="page" id="p_add_question">
            <input type="text" name="question" class="input_select" id="question" placeholder="Question">
            <select name="matiere" class="input_select liste_input" id="matiere_select_question">
                <?php
                    include 'includes/option_matiere.php';
                ?>
            </select>
            <select name="matiere" class="input_select liste_input" id="chapitre_select_question">
                <?php
                    include 'includes/option_chapitre.php';
                ?>  
            </select>
            <input type="button" id="b_add_question" value="Ajouter">
        </section>

        <!-- Chapitres -->
        <section class="page" id="chapitres">
            <div id="liste_chapitres">
            </div>
        </section>

        <!-- Quiz -->
        <section class="page" id="quiz">
            <h1 id="titre_quiz"></h1>
            <div id="réponses">
                <p></p>
                <p></p>
                <p></p>
                <p></p>
            </div>
        </section>
    </div>
    <footer>
        <p>© 2018 - Nom de l'auteur</p>
    </footer>
</body>
    <script src="script_index.js"></script>
</html>