<?php

if(isset($_POST['inscription'])){

    if(!empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
                    
        if($_POST["password"] == $_POST["cpassword"]){

            $q = $db->prepare("SELECT * FROM users WHERE email = :email");
            $q->execute([
                'email' => $_POST["email"]
            ]);
            $result = $q->fetch();

            if(!$result){
                $options = [
                    'cost' => 12,
                ];
                $hashpass = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);

                $q = $db->prepare("INSERT INTO users(pseudo, email, password) VALUES (:pseudo, :email, :mdp)");
                $q->execute([
                    'pseudo' => $_POST["pseudo"],
                    'email' => $_POST["email"],
                    'mdp' => $hashpass
                ]);
                echo "Inscription réussie";
            }
            else{
                echo "Email déjà utilisé";
            }
        }
        else{
            echo "Les mots de passe ne correspondent pas";
        }
    }
}
?>