<?php

    $q = $db->query('SELECT * FROM cours ORDER BY cours');
    while ($cours = $q->fetch()) {
        echo '<p>'.$cours['cours'].'</p>';
    }

?>