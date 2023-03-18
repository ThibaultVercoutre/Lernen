<?php

include '../includes/database.php';
global $db;

$matiere = $_POST['matiere'];

$q = $db->prepare("INSERT INTO `cours`(`cours`) VALUES (:cours)");
$q->execute([              
    'cours' => $_POST['matiere']
]);
?>