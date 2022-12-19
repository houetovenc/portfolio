<!-- // dans ce fichier on vas créer la page de connexion a nitre back-office / avec le login identifiant et mot de passe  -->

<?php
include("../assets/inc/headback.php")

?>

<?php
include("../assets/inc/headerback.php")

?>
<title>Login Administrateur</title>


<div class="row">
    <?php
    if (isset($_SESSION["message1"])) :
        echo '<div class="alert alert-danger text-center" role="alert" role = "alert">
        ' . $_SESSION["message1"] . '
        </div>';
        // on efface la clé message, une fois qu'elle a été afficher
        unset($_SESSION["message1"]);
    endif;

    ?>

</div>

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

</div>

<div class="row">
    <?php
    if (isset($_SESSION["message2"])) :
        echo '<div class="alert alert-success text-center" role="alert" role = "alert">
        ' . $_SESSION["message2"] . '
        </div>';
        // on efface la clé message, une fois qu'elle a été afficher
        unset($_SESSION["message2"]);
    endif;

    ?>

</div>




<main>



    <div class="container row pt-5 mx-auto d-flex justify-content-center">


        <div class="container mx-auto d-flex justify-content-center">

            <div class="row border rounded shadow">
                <h3 class="text-center my-3">Login</h3>
                <form action="../core/userController.php" method="POST">
                    <input type="hidden" name="faire" value="log-admin">
                    <input class="form-control mb-2" type="email" name="email" placeholder="Votre Email">
                    <input class="form-control mb-2" type="password" name="password" placeholder="Votre mot de passe">

                    <div class="container d-flex justify-content-end m-0 p-0 pb-3">
                        <button class="btn bg-secondary text-light fw-light" name="soumettre" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</main>


<?php
include("../assets/inc/footerFront.php")

?>