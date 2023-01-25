<?php
include("assets/inc/front/headFront.php")
?>
<title>Portfolio</title>


<?php
include("assets/inc/front/headerFront.php")
?>

<main>

    <?php


    if (isset($_SESSION["message"])) :
        echo '<div class="alert alert-primary text-center" role="alert">
        ' . $_SESSION["message"] . '
        </div>';

        unset($_SESSION["message"]);

    endif;

    if (isset($_SESSION["message1"])) :
        echo '<div class="alert alert-danger text-center" role="alert">
        ' . $_SESSION["message1"] . '
        </div>';

        unset($_SESSION["message1"]);

    endif;

    ?>

    <div class="row">
        <?php
        if (isset($_SESSION["message2"])) :
            echo '<div class="alert alert-success text-center m-0" role="alert" role = "alert">
            ' . $_SESSION["message2"] . '
            </div>';
            // on efface la clé message, une fois qu'elle a été afficher
            unset($_SESSION["message2"]);
        endif;
        ?>
    </div>


    <div class="entete  pb-5">
        <div class="imgblk">
            <img class="imageaccueil" src="assets/images/imgaccueil.jpg" alt="lignedecode">
        </div>
        <div class="titreimage">
            <h4 class="HV">Houeto Venceslas</h4>
        </div>
        <div class="textimage">
            <p class="titreimage2">Développeur Web Junior - Intégrateur</p>
        </div>
    </div>

    <div class="col pb-5 pt-5">
        <div class="text-center">
            <h3 class="titresection1">A PROPO DE MOI</h3>
        </div>
        <div class="row justify-content-around px-5 mx-5 pt-5">
            <div class="container" style="width: 400px;">
                <img class="imageportrait border border-3" src="assets/images/portrait.jpg" alt="portrait">
            </div>
            <div class="container text-center" style="width: 700px;">
                <p class="descriptionofme">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum, dicta accusamus!
                    Adipisci officia dolores illum! Itaque nihil voluptas dolorum praesentium,
                    magni sequi illum ut repellendus expedita libero explicabo accusantium assumenda iste architecto a doloribus quasi soluta eius,
                    quam pariatur porro neque dolor impedit animi! Dolor fugit consequuntur impedit magnam sapiente!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum, dicta accusamus!
                    Adipisci officia dolores illum! Itaque nihil voluptas dolorum praesentium, </p>
            </div>
        </div>
    </div>

    <div class="bannier pb-5 pt-5">
        <div class="imgbannier">
            <img class="bannier" src="assets/images/bannier.jpg" alt="bannier">
        </div>
        <div class="titreimage2">
            <h4 class="actuellementtitre">Actuellement :</h4>
        </div>
        <div class="textimage2">
            <p class="actuellementtext">Formation PHP - Symfony<br>La Manu ( versailles )</p>
        </div>
    </div>

    <div class="col ">
        <div class="container text-center pt-5 pb-5">
            <h3 class="titresection2">Soft Skills</h3>
        </div>

        <div class="row justify-content-around">
            <div class="card" style="width: 18rem;">
                <img src="assets/images/chercher.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="assets/images/creativite.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="assets/images/developpement.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col pt-5 pb-5">
        <div class="container text-center pb-5">
            <h3 class="titresection2">Compétences</h3>
        </div>

        <div class="row justify-content-around">
            <div class="container" style="width: 500px;">
                <div class="pb-3  ">
                    <h5 class="text-center m-0 pt-3 mt-3">Front-End</h5>
                    <p class="m-0">HTML</p>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                    </div>
                    <p class="m-0">CSS</p>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
                    </div>
                    <p class="m-0">Javascript</p>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                    </div>
                    <p class="m-0">Bootstrap</p>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
                    </div>
                </div>
                <div class="pb-3">
                    <h5 class="text-center m-0 pt-3 mt-3">Back-End</h5>
                    <p class="m-0">PHP</p>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%"></div>
                    </div>
                    <p class="m-0">MySql</p>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
                    </div>
                </div>
                <div class="pb-3">
                    <h5 class="text-center m-0 pt-3 mt-3">Cms</h5>
                    <p class="m-0">Wordpress</p>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%"></div>
                    </div>
                </div>
                <div class="pb-3">
                    <h5 class="text-center m-0 pt-3 mt-3">Frameworks</h5>
                    <p class="m-0">Symfony</p>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%"></div>
                    </div>
                    <p class="m-0">Angular</p>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%"></div>
                    </div>
                </div>
            </div>
            <div class="container text-center" style="width: 400px;">
                <img class="cv1 border border-3 mt-4" src="assets/images/cv1.png" alt="">
                <button type="button" class="btn btn-light border border-3 mt-5">Télécharger mon CV</button>
            </div>
        </div>
    </div>
    <div class="bannier pb-5 pt-5">
        <div class="imgbannier2">
            <img class="bannier" src="assets/images/bannier2.jpg" alt="">
        </div>


    </div>

</main>

<?php
include("assets/inc/front/footerFront.php")
?>