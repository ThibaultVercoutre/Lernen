<?php

    $q = $db->query('SELECT * FROM cours ORDER BY cours');

    $result = $q->fetchColumn();

    $q = $db->prepare('SELECT * FROM chapitres WHERE matiere = :min ORDER BY numero');
    $q->execute([              
        'min' => $result
    ]);
    while ($chapitre = $q->fetch()) {
        echo '<option data="'.$chapitre['titre'].'">'.$chapitre['numero'].' - '.$chapitre['titre'].'</option>';
    }

?>