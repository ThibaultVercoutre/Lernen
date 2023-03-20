<?php

    include '../includes/database.php';
    global $db;

    $q = $db->prepare('SELECT id FROM cours WHERE cours = :cours');
    $q->execute([              
        'cours' => $_POST['matiere']
    ]);
    $matiere = $q->fetchColumn();

    $q = $db->prepare('SELECT id FROM chapitres WHERE titre = :chapitre');
    $q->execute([              
        'chapitre' => $_POST['chapitre']
    ]);

    $chapitre = $q->fetchColumn();

    $q = $db->prepare("INSERT INTO `questions`(`question`, `cours`, `chapitre`) VALUES (:question,:cours,:chapitre)");
    $q->execute([              
        'question' => $_POST['question'],
        'cours' => $matiere,
        'chapitre' => $chapitre
    ]);
?>