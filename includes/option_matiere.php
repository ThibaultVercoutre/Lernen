<?php

    $q = $db->query('SELECT * FROM cours ORDER BY cours');
    while ($cours = $q->fetch()) {
        echo '<option>'.$cours['cours'].'</option>';
    }

?>