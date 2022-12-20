<?php
include("assets/inc/headFront.php")
?>
<title>Portfolio</title>


<?php
include("assets/inc/headerFront.php")
?>
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

<main>
</main>

<?php
include("assets/inc/footerFront.php")
?>