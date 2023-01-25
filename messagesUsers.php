<?php
include("assets/inc/front/headFront.php");
include("assets/inc/front/headerFront.php");
?>

<title>laisser un message</title>

<main>



    <div class="container pt-5 mx-auto d-flex justify-content-center">
        <div>
            <h3 class="text-center my-3">Message</h3>
            <div class="container row">
                <form action="" method="POST" class="justify-content-center" enctype="multipart/form-data">
                    <div class="mx-auto border rounded shadow px-3 py-3">
                        <div class="row pb-3">
                            <div class="col">
                                <label for="nom" class="visually-hidden"></label>
                                <input type="text" class="form-control" aria-label="lenom" name="lenom" placeholder="Votre Nom">
                            </div>
                            <div class="col">
                                <label for="prenom" class="visually-hidden"></label>
                                <input type="text" class="form-control" aria-label="leprenom" name="leprenom" placeholder="Votre Prénom">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col">
                                <label for="societe" class="visually-hidden"></label>
                                <input type="text" class="form-control" aria-label="societe" name="societe" placeholder="Societe">
                            </div>
                            <div class="col">
                                <label for="telephone" class="visually-hidden"></label>
                                <input type="text" class="form-control" aria-label="telephone" name="telephone" placeholder="N° Téléphone">
                            </div>
                        </div>
                        <div class=" pb-2">
                            <div class="col-md pb-3 p-0 m-0">
                                <label for="email" class="visually-hidden"></label>
                                <input type="email" class="form-control" aria-label="email" name="email" id="email" placeholder="Adresse Mail">
                            </div>
                            <div class="col-md row pb-3 p-0 m-0 justify-content-around">
                                <div class="col-md p-0 m-0">
                                    <label for="nationalite" aria-label="nationalite" class="visually-hidden"></label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label id="message" for="message" aria-label="message" class="form-label">Votre message :</label>
                                <textarea type="text" name="message" class="form-control" aria-label="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="container  d-flex justify-content-end m-0 p-0">
                            <input class="mt-2 col-4 bg-white border rounded" type="submit" value="envoyer">
                        </div>
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

include("assets/inc/front/footerFront.php")

?>