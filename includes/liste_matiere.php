<?php

    $q = $db->query('SELECT * FROM cours');
    while ($cours = $q->fetch()) {
        echo '<p>'.$cours['cours'].'</p>';
    }

?>