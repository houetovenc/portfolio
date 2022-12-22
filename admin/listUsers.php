<?php
include("../assets/inc/back/headBack.php");
include("../assets/inc/back/headerBack.php");

/*TODO: si l'utilisateur n'est pas connecté ou n'est pas administrateur,
le rediriger et l'inviter à se reconnecter
*/
if (
    !isset($_SESSION["role"], $_SESSION["isLog"], $_SESSION["prenom"])
    || !$_SESSION["isLog"] || $_SESSION["role"] != 1
) :
    $_SESSION["message3"] = "Vous n'êtes pas l'administrateur de ce site";
    // redirection vers la page d'accueil
    header("Location:../index.php");
endif;


require("../core/connexion.php");

$sql = "SELECT `id_user`, `nom`, `prenom`, `email`, `role`
    FROM `user`
";

$query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

$users = mysqli_fetch_all($query, MYSQLI_ASSOC);



?>

<title>Liste des utilisateurs inscrits
</title>


<?php
?>


<div class="row">
    <?php




    if (isset($_SESSION["message2"])) :
        echo '<div class="alert alert-success text-center" role="alert" role = "alert">
                ' . $_SESSION["message2"] . '
                </div>';
        // on efface la clé message, une fois qu'elle a été afficher
        unset($_SESSION["message2"]);
    endif;

    if (isset($_SESSION["message3"])) :
        echo '<div class="alert alert-success text-center" role="alert" role = "alert">
                ' . $_SESSION["message3"] . '
                </div>';
        // on efface la clé message, une fois qu'elle a été afficher
        unset($_SESSION["message3"]);
    endif;



    ?>

</div>



<main>
    <!-- TODO: pour chaque utilisateur créer une nouvelle ligne (tr) et afficher ses information dans des cellules (td) -->

    <div class="container row mx-auto d-flex justify-content-center pt-5 px-3 py-3">

        <div class=" row border rounded shadow pt-5 px-5 py-5">
 <!-- (écriture 2) -->
        <h4>USERS</h4>
        <p><a href="createUsers.php" class="btn btn-secondary">NEW</a>
</p>

            <div>
                <table class='table'>

                    <thead>
                        <tr>
                            <th><a class="" href="updateUsers.php"></a>ID</th>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>MAIL</th>
                            <th>ROLE</th>
                            <th class="text-center">ACTIONS</th>
                    </thead>

                    <?php

                    foreach ($users as $user) {

                    ?>

                        <tr>
                        <td><a href="readUsers.php?id=<?= $user["id_user"]; ?> "><?= $user["id_user"]; ?></a></td>
                            <td><?= $user["nom"]; ?></td>
                            <td><?= $user["prenom"]; ?></td>
                            <td><?= $user["email"]; ?></td>
                            <td><?php
                                if ($user["role"] == 1) {
                                    echo "administrateur";
                                } else {
                                    echo "utilisateur";
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <a type="button" href="readUsers.php?id=<?= $user["id_user"]; ?> " class="btn btn-secondary">Afficher</a>
                                <a type="button" href="updateUsers.php?id=<?= $user["id_user"]; ?> " class="btn btn-secondary">Modifier</a>
                                <a type="button" href="deleteUsers.php?id=<?= $user["id_user"]; ?> " class="btn btn-secondary">Supprimer</a>
                                </td>

                            

                        </tr>
                    <?php
                    }

                    ?>
                </table>
            </div>



        </div>



    </div>



</main>

<?php
include("../assets/inc/back/footerBack.php")

?>
<!-- 

<div class=" row border rounded shadow pt-5 px-5 py-5">
(ECRITURE 1)
<h4>USERS (écriture 1)</h4>

    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>MAIL</th>
                <th>ROLE</th>
        </thead>
        <?php
        foreach ($users as $user) {
            echo " <tbody>
                    <tr>
                        <td>" . $user['id_user'] . "</td>
                        <td>" . $user['nom'] . "</td>
                        <td>" . $user['prenom'] . "</td>
                        <td>" . $user['email'] . "</td>
                        <td>" . $user['role'] . "</td>
                        <td>DELETE</td>
                    </tr>
                </tbody>";
        }
        ?>

    </table>
</div>
<br>
<br>-->