<?php

    $q = $db->query('SELECT * FROM cours');
    while ($cours = $q->fetch()) {
        echo '<option>'.$cours['cours'].'</option>';
    }

?>