<?php

/*TODO: si l'utilisateur n'est pas connecté ou n'est pas administrateur,
le rediriger et l'inviter à se reconnecter
*/
include("../assets/inc/headBack.php")
?>

<title>
</title>


<?php
include("../assets/inc/headerBack.php");
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
                ' . $_SESSION["message2"] . '
                </div>';
        // on efface la clé message, une fois qu'elle a été afficher
        unset($_SESSION["message3"]);
    endif;


    if (isset($_SESSION["role"],$_SESSION["isLog"],$_SESSION["prenom"]) 
    || !$_SESSION["isLog"] || $_SESSION["rôle"] != 1 ):
    $_SESSION["message3"] = "Vous n'êtes pas l'administrateur de ce site";
    // redirection vers la page d'accueil
    header("Location:../index.php");
    endif;

    ?>

</div>



<main>

    <?php

    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';

    ?>

    <div class="container">
        <form action="../core/userController.php" method="post">
            <input type="hidden" name="faire" value="log-out">
            <button class="btn bg-secondary text-light fw-light" type="submit" name="soumettre">Se deconnecter</button>
        </form>
    </div>

</main>

<?php
include("../assets/inc/footerBack.php")

?>