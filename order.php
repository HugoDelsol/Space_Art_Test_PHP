<?php
include('head.php');
include('header.php');

if (!isset($_SESSION['user'])) {

    //popup ??
    header("location: signIn.php");
    exit();
}

$userId = $_SESSION['user']['id'];

//var_dump($userId);

$artworkId = $_GET['artworkId'];
var_dump($artworkId);

try {
    $request = $db->prepare(" INSERT INTO `order` (_id_user, _id_artwork) VALUES (?, ?) ");
    $request->execute([
        $userId,
        $artworkId
    ]);

    if ($_GET['artworkId']) {
        header("location: index.php?alertSuccessShop");
        exit();
    }
} catch (Exception $e) {

    var_dump($e->getMessage());
    $alertError = "Echec de l'insertion dans la BDD";
}

$request = $db->query(" SELECT * FROM artwork
                        RIGHT JOIN `order`
                        ON _id_artwork = artwork_id
                        WHERE artwork_id = $artworkId");

$dataOrder = $request->fetch(PDO::FETCH_ASSOC);
var_dump($dataOrder);

include("alert.php")
?>

<h1>Votre commande :</h1>

<div class="container my-4">
    <div class="card" style="width: 18rem;">
        <img src="./public/pictures/<?= $dataOrder["artwork_picture"] ?>" class="card-img-top" alt="Oeuvre d'art">
        <div class="card-body">
            <h5 class="card-title"><?= $dataOrder['artwork_name'] ?></h5>
            <p class="card-text fw-bold"><?= "Prix : " . $dataOrder['artwork_price'] ?></p>
            <a href="#" class="btn btn-primary">Ajouter au panier</a>
        </div>
    </div>
</div>




<?php
include('footer.php');
?>