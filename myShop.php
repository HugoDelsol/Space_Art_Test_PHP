<?php
include('head.php');
include('header.php');

if (!isset($_SESSION['user'])) {

    //popup ??
    header("location: signIn.php");
    exit();
}

$userId = $_SESSION['user']['id'];

var_dump($userId);

$artworkId = $_GET['artworkId'];
var_dump($artworkId);
// PROBLEME ICI
$request = $db->query(" SELECT * FROM artwork
                        RIGHT JOIN `order` 
                        ON _id_artwork = artwork_id
                        WHERE artwork_id = $artworkId");

$dataOrder = $request->fetch(PDO::FETCH_ASSOC);
var_dump($dataOrder);

include("alert.php")
?>

<h1>Votre panier :</h1>

<div class="container my-4">
    <div class="card" style="width: 18rem;">
        <img src="./public/pictures/" class="card-img-top" alt="Oeuvre d'art">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text fw-bold"></p>
            <a href="#" class="btn btn-primary">Ajouter au panier</a>
        </div>
    </div>
</div>




<?php
include('footer.php');
?>