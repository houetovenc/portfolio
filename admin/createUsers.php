<?php

// il faut créer un user avec le role admin dans la bdd pour avoir un personne administrateur du back-office
//(console d'administraion)
// Pour cela on crée un formulaire user pour renseigner la bdd
// au niveau du CRUD, nous allons fair un Create avec l'instruction SQL INSERT INTO

include("../assets/inc/back/headback.php");

include("../assets/inc/back/headerback.php");



?>
                <?php
                //on récupère le fichier de connexion -> connexion.php qui correspond aux paramètre de connexion de notre bdd
                require("../core/connexion.php");
                // Une condition pour récupérer les données du formulaires

                if (isset($_POST["soumettre"])) :
                    $nom = addslashes(trim(ucfirst($_POST["nom"])));
                    $prenom = addslashes(trim(ucfirst($_POST["prenom"])));
                    $email = trim(strtolower($_POST["email"]));
                    $options = ['cost' => 12];
                    $motdepass = password_hash(trim($_POST["motdepass"]), PASSWORD_DEFAULT, $options);
                    // on dit que 1 est admin pour le rôle
                    // $role1 = 1;
                    if (isset($_POST["isAdmin"])) {
                            $role = 1;
                    } else {
                        $role = 2;
                    };
                   

                    // préparation de l'ecriture SQL
                    $sql = "
                        INSERT INTO user (nom,prenom,email,password,role)
                        VALUE ('$nom', '$prenom', '$email', '$motdepass', '$role')
                    ";

                    // execution de la requète avec les paramètres de connexion
                    mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

                    // Message
                    $_SESSION["message"] = "L'utilisateur $nom $prenom à été correctement ajouter à la base de données";
                    // redirection vers notre page d'acceuil (index.php)
                    header("Location:../index.php");
                    exit;

                endif;
                ?>

<title>Création d'un admin</title>

<main>

    <div class="col-md p-5 m-0 text-center">
        <p>    </p>
    </div>


    <div class="container mx-auto d-flex justify-content-center">
        <div class="row border rounded shadow">
            <h3 class="text-center my-3">Admin</h3>
            <div class=" form-group">
                <form action="" method="POST">
                    <input class="form-control mb-2" type="text" name="nom" placeholder="Votre Nom">
                    <input class="form-control mb-2" type="text" name="prenom" placeholder="Votre Prenom">
                    <input class="form-control mb-2" type="email" name="email" placeholder="Adresse Mail">
                    <input class="form-control mb-2" type="password" name="motdepass" placeholder="Mot de passe">
                    <div class="py-2">
                    <label for="isAdmin">Rôle Administrateur</label>
                        <input class="form-check-input bg-dark" type="checkbox" id="isAdmin" name="isAdmin">
                    </div>
                    <div class="container d-flex justify-content-end m-0 py-2">
                        <button class="btn bg-secondary text-light fw-light" name="soumettre" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center pt-3 p-0 m-0">
                <a type="button" href="listUsers.php" class="btn bg-white mt-3 col-1 ">Retour List</a>
            </div>
</main>

<?php
include("../assets/inc/back/footerBack.php")
?>