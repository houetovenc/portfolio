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


    <div class="container col-3 border rounded shadow px-5 py-5 my-5 pt-5">
        <h2 class="text-center py-2">Modifier l'utilisateur</h2>
        <form method="POST" action="../core/userController.php">
        <input type="hidden" name="faire" value="update">
        <input type="hidden" name="id" value="<?= $user["id_user"]; ?>" />

            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" class="form-control" value="<?= $user["nom"];?>" />
    
            <label for="prenom">Prenom :</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="<?= $user["prenom"];?>" />
    
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $user["email"];?>" />
    
            <label for="motdepass">Mot de passe :</label>
            <input type="password" name="motdepass" id="motdepass" class="form-control" value="" />
    
            <label for="role">Rôle</label>
            <select name="role" id="role" class="form-control" >
            <option value="2"<?php if($user ["role"] == 2) {
                echo "selected";
            } ?> >utilisateur</option>
            <option value="1"<?php if($user ["role"] == 1) {
                echo "selected";
            } ?> >Administrateur</option>
            </select>
            <button type="submit" class="btn btn-secondary mt-3">Modifier</button>


        </form>

    </div>


</main>

<?php
include("../assets/inc/back/footerBack.php")

?>