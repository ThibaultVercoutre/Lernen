<?php

include '../includes/database.php';
global $db;

$q = $db->prepare("SELECT id FROM `cours` WHERE cours = :cours");
$q->execute([              
    'cours' => $_POST['matiere']
]);

$result = $q->fetchColumn();

$q = $db->prepare("INSERT INTO `chapitres`(`numero`,`titre`,`matiere`) VALUES (:numero, :titre, :matiere)");
$q->execute([              
    'numero' => $_POST['n_chapitre'],
    'titre' => $_POST['titre'],
    'matiere' => $result
]);

echo $result;
?>