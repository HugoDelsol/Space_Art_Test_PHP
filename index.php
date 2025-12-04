<?php
include('head.php');
include('header.php');

if (isset($_GET['alertSuccessShop'])) {
    header('location: index.php?success');   
}

if (isset($_GET['success'])) {
    $alertSuccess = "Le produit a bien été ajouté au panier !";       
}

$request = $db->query("SELECT * FROM artwork");
$artworkData = $request->fetchAll(PDO::FETCH_ASSOC);
//var_dump($artworkData);

include("alert.php")
?>

<h1>Bienvenue sur ArtSpace!</h1>
<h3>Publie, vends et achète des œuvres d’art du monde entier.</h3>

<?php
$bgColors = ['#f8f9fa', '#eef7ff', '#fff8e1', '#f1f8f5', '#fff0f6']; // Quelques backgrounds au choix

for ($i = 0; $i < count($artworkData); $i++) {
    $bgColor = $bgColors[$i % count($bgColors)]; // Cycler les backgrounds
?>
    <div class="col-12 mb-4">
        <div class="card border-0 rounded-4 shadow-sm hover-shadow" style="background-color: <?= $bgColor ?>;">
            <div class="row g-0 align-items-center">

                <!-- Image -->
                <div class="col-md-4 p-3">
                    <div class="rounded-3 overflow-hidden shadow-sm" style="height: 450px; ">
                        <img src="<?= "./public/pictures/" . $artworkData[$i]["artwork_picture"] ?>"
                            class="img-fluid h-100 w-100"
                            style="object-fit: cover; border-radius: 1em; box-shadow: 0px 0px 6px grey; margin-left:1em;"
                            alt="Oeuvre d'art">
                    </div>
                </div>

                <!-- Contenu -->
                <div class="col-md-8">
                    <div class="card-body p-4 d-flex flex-column h-100 justify-content-between">
                        <div>
                            <h4 class="fw-bold mb-2"><?= $artworkData[$i]['artwork_name'] ?></h4>
                            <p class="text-muted mb-3"><?= $artworkData[$i]['artwork_description'] ?></p>
                        </div>

                        <div class="d-flex justify-content-between align-items-end">
                            <div>
                                <p class="mb-1">
                                    <span class="fw-semibold">🎨 Artiste :</span>
                                    <span class="text-primary"><?= $artworkData[$i]['artwork_artist'] ?></span>
                                </p>
                                <p class="mb-0">
                                    <span class="fw-semibold">💰 Prix :</span>
                                    <span class="text-success"><?= $artworkData[$i]['artwork_price'] . " $" ?></span>
                                </p>
                            </div>
                            <button class="btn btn-primary rounded-pill px-4"><a style="color: white;" href="./order.php?artworkId=<?= $artworkData[$i]["artwork_id"] ?>">Ajouter au panier</a></button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
<?php } ?>



<?php
include('footer.php');


?>