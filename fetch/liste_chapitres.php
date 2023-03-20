<?php

include '../includes/database.php';
global $db;

$matiere = $_POST['matiere'];

$q = $db->prepare("SELECT * FROM `cours` WHERE cours = :cours");
$q->execute([              
    'cours' => $_POST['matiere']
]);

$result = $q->fetchColumn();

$q = $db->prepare("SELECT numero, titre FROM `chapitres` WHERE matiere = :id ORDER BY numero");
$q->execute([              
    'id' => $result
]);

$result = json_encode($q->fetchAll());

echo $result;
?>