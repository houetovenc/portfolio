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

$id = $_GET['id'];

$sql = "SELECT `id_user`,`nom`,`prenom`,`email`,`role`
    FROM user
    WHERE id_user = $id
    ";

$query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

$user = mysqli_fetch_assoc($query);


?>

<title>modification de compte
</title>


<?php
?>


<div class="row">

    <?php
    if (isset($_SESSION["message"])) :
        echo '<div class="alert alert-danger text-center" role="alert" role = "alert">
        ' . $_SESSION["message"] . '
        </div>';
        // on efface la clé message, une fois qu'elle a été afficher
        unset($_SESSION["message"]);
    endif;



    ?>

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
    
    <div class="container pt-5 d-flex justify-content-center">

    <div class="container pt-5 col-3">

        <div class=" row border rounded shadow px-5 py-5">
            <h3>informations</h3>
            <ul>
                <li><?= $user["id_user"]; ?></li>
                <li><?= $user["nom"]; ?></li>
                <li><?= $user["prenom"]; ?></li>
                <li><?= $user["email"]; ?></li>
                <li><?php
                    if ($user["role"] == 1) {
                        echo "administrateur";
                    } else {
                        echo "utilisateur";
                    }
                    ?></li>
            </ul>
        </div>

    </div>

    
        <div class="container col-6 text-center border rounded shadow px-5 py-5">



            <h2>Suppression de l'utilisateur</h2>
            <?php
            $id = $_GET["id"];
            require("../core/connexion.php");
            $sql = "SELECT id_user, nom, prenom, email, role
    FROM user
    WHERE id_user = $id
    ";
            $query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
            $users = mysqli_fetch_assoc($query);
            ?>

            <h4>Attention vous êtes sur le point de supprimer l'utilisateur <?php echo $users["nom"] . " " . $users["prenom"] . " 😦 " ?> </h4>

            <div  class="container d-flex justify-content-around ">
                <a type="button" class="btn bg-white mt-3 " href="listUsers.php">Retour liste</a>
                <form action="../core/userController.php" method="POST">
                    <input type="hidden" name="faire" value="delete">
                    <input type="hidden" name="id" value="<?= $users["id_user"] ?>">
                    <button type="submit" class="btn bg-white mt-3">Supprimer</button>
                </form>

            </div>
        </div>
    </div>


</main>

<?php
include("../assets/inc/back/footerBack.php")

?>