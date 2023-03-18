<?php

if(isset($_POST['connexion'])){

    if(!empty($_POST["email"]) && !empty($_POST["password"])){

        $q = $db->prepare('SELECT * FROM users WHERE email = :email');
        $q->execute([
            'email' => $_POST["email"]
        ]);
        $result = $q->fetch();
        
        if($result == true){
            if(password_verify($_POST["password"], $result["password"])){
                echo "Vous êtes connecté";
                header('Refresh: 3; url=principale.php');
            }
            else{
                echo "Mauvais mot de passe";
            }
        }else{
            echo "Email inconnu";
        }
        

    }
}

?>