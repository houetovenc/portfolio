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
        // log-Out correspond à value="log-Out" dans l'input caché
        // du fichier admin/index.php
        case "log-out":
            logOut();
        break;
    endswitch;
    switch ($action):
        
        case "update":
            updateUser();

            break;
    endswitch;
    switch ($action):
        
        case "delete":
            deleteUser();

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
        // avec la fonction motdepass_verify() qui nous renvoie true ou false, on vérifie le mot de passe.
            if (password_verify(trim($_POST["motdepass"]), $user["password"])):
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
                    header("Location:../index.php");
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
    function updateUser(){

        // Vérifier si les informations on bien été envoyées
        if(!isset($_POST["nom"],$_POST["prenom"],
        $_POST["email"],$_POST["motdepass"], $_POST["role"],$_POST["id"])){
            $_SESSION["message"] = "Information(s) manquante(s) dans le formulaire";
            header("Location:../admin/updateUsers.php?id=" . $_POST["id"]);
            exit;

        }

        // Récupération des informations envoyer pas le formulaire
        
        $nom = ucfirst(trim($_POST["nom"]));
        $prenom = ucfirst(trim($_POST["prenom"]));
        $email = strtolower(trim($_POST["email"]));
        $role = $_POST["role"];
        $id = $_POST["id"];
        // Encodage du mot de passe
        $options = ['cost' => 12];
        $motdepass = password_hash(trim($_POST["motdepass"]), PASSWORD_DEFAULT, $options);
        // validation des informations

        if(strlen($nom) < 1 || strlen($nom) > 255){
            $_SESSION["message"] = "Le nom doit avoir un nombre ce caractère compris entre 1 et 255";
            header("Location:../admin/updateUsers.php?id=". $_POST["id"]);
            exit;
        }

        if(strlen($email) < 1 ) {
            $_SESSION["message"] = "L'Email est invalide";
            header("Location:../admin/updateUsers.php?id=". $_POST["id"]);
            exit;
        }

        if(strlen($motdepass) < 1 ) {
            $_SESSION["message"] = "Le mot de passe doit contenir au moins 1 caractère";
            header("Location:../admin/updateUsers.php?id=". $_POST["id"]);
            exit;
        }

        if($role !=  1 && $role != 2) {
            $_SESSION["message"] = "Le rôle est invalide";
            header("Location:../admin/updateUsers.php?id=". $_POST["id"]);
            exit;
        }
        // Les données sont valider, préparons nous a les envoyer en Bdd
        require("connexion.php");
        
        $sql = "UPDATE user 
            SET
                `nom` = '$nom',
                `prenom` = '$prenom',
                `email` = '$email',
                `role` = $role,
                `password` = '$motdepass'
            WHERE `id_user` = $id
            ";


            mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

             $_SESSION["message2"] = "Les données on bien été mise à jour";
            header("Location:../admin/readUsers.php?id=". $_POST["id"]);
            exit;

    }
    function deleteUser(){
        //recupération de la connexion
        require("connexion.php");
        //recupération de l'id dans l'input caché du formulaire du bouton qui à le name="id"
        $id = $_POST['id'];
        $sql = "DELETE FROM user WHERE id_user = $id";
        $query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
        $_SESSION["message"] = "Lutilisateur a bien été supprimé";
        header("Location:../admin/listUsers.php");

    }

?>