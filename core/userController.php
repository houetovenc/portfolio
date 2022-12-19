<?php
    session_start();

    // on analyse ce qu'il y a à faire :
    $action = "empty";
    // si la clé "faire" est détecté dans $_POST (avec la balise caché
    // input type = "hidden")
    if (isset($_POST["faire"])):
        // notre variable action est égale à la valeur de la clé faire
        $action = $_POST["faire"];
    endif;

    // on utilise un switch pour vérifier l'action
    switch ($action):
        // log-admin correspond à value="log-admin" dans l'input caché
        // du fichier admin/index.php
        case "log-admin":
            logAdmin();
        break;
    endswitch;

    // on utilise un switch pour vérifier l'action
    switch ($action):
        // log-admin correspond à value="log-admin" dans l'input caché
        // du fichier admin/index.php
        case "log-out":
            logOut();
        break;
    endswitch;

    // les différentes fonctions de notre controleur
    function logAdmin(){
        // besoin de notre connexion
        require("connexion.php");
        // vérification de l'email de l'admin qui est unique
        // préparation des données, formatage
        $email = trim(strtolower($_POST["email"]));
        // écriture SQL (Read au niveau  du CRUD) avec SELECT
        $sql = "SELECT *
                FROM user
                WHERE email = '$email'
        ";
        // execution de la requète
        $query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
        // traitement des données
        // on vérifie que l'email existe, pour se faire on utilise la fonction mysqli_num_rows() qui compte le nombre de ligne
        if (mysqli_num_rows($query) > 0):
        // on met sous forme de tableau associatif les données de
        // l'admin récupéré
        $user = mysqli_fetch_assoc($query);
        // ensuite il faut vérifier le mot de passe
        // le but c'est de vérifier si le mot de passe saisie = à l'encodage stocké en bdd
        // avec la fonction password_verify() qui nous renvoie true ou false, on vérifie le mot de passe.
            if (password_verify(trim($_POST["password"]), $user["password"])):
                // vérifier le rôle
                // on dit que 1 c'est le role admin
                if ($user["role"] != 1):
                    // on envoie un message d'alerte
                    $_SESSION["message1"] = "Vous n'êtes pas l'administrateur de ce site";
                    // redirection vers la page d'accueil
                    header("Location:../index.php");
                    exit;
                else:
                    // on crée plusieurs variables de session qui
                    // permettent un affichage personnalisé et de sécuriser l'accès du back-office
                    $_SESSION["prenom"] = $user["prenom"];
                    $_SESSION["isLog"] = true;
                    $_SESSION["role"] = $user["role"];
                    $_SESSION["message2"] = "Welcome !";
                    header("Location:../admin/accueilAdmin.php");
                    exit;
                endif;
            else:
                // sinon erreur de mot de passe
                $_SESSION["message"] = "Erreur de mot de passe, veuillez réessayer.";
                header("Location:../admin/index.php");
                exit;
            endif;
        else:
            // sinon pas d'utilisateur identifié
            $_SESSION["message"] = "Désolé, cette identifiant ne correspond à aucun administrateur !";
            header("Location:../admin/index.php");
            exit;
        endif;
    }


    function logOut(){
        // pour déconnecter l'admin, il faut supprimer les variables de session
        // on détruit la session avec session_destroy()
        session_destroy();
        session_start();
        // message flash
        $_SESSION["message"] = "Vous êtes déconnecté !";
        // redirection vers page d'accueil du site
        header("Location:../index.php");
        exit;
    }


?>