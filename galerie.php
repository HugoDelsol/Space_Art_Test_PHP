<?php
include('head.php');
include('header.php');

$valueName = null; 
$valueSummary = null; 
$valueArtist = null; 
$valuePrice = null; 

if (!isset($_SESSION['user'])) {

    //popup ??
    header("location: signIn.php");
    exit();}

if (isset($_POST["name"])) {

    if (
        empty($_POST["name"]) ||
        empty($_POST["summary"]) ||
        empty($_POST["artist"]) ||
        empty($_POST["price"]) 
        ///empty($_POST["picture"]) POURQUOI ON NE VERIFIE PAS SI IL EST VIDE ?
    ) {
        $valueName = $_POST['name'];        
        $valueSummary = $_POST['summary'];        
        $valueArtist = $_POST['artist'];        
        $valuePrice = $_POST['price'];        

        $alertError = "Veuillez renseigner tout les champs";
    } else {

        try {           

            $file = null;
            $uploadOk = false;

            if (!empty($_FILES["picture"]["name"])) {

                $uploadOk = true;
                $now = date("d-m-Y H-i-s");
                $imgFileType = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));
                $targetDir = "./public/pictures/";
                $targetFile = $targetDir . $_POST['name'] . '-' . $now . '.' . $imgFileType;
                $check = getimagesize($_FILES['picture']['tmp_name']);

                if ($check === false || empty($imgFileType)) {
                    $uploadOk = false;
                    $alertError = "Ceci n'est pas une image.";
                }

                if (file_exists($targetFile)) {
                    $uploadOk = false;
                    $alertError = "Un fichier du meme nom existe deja !";
                }

                if ($_FILES['picture']["size"] > 700000) {
                    $uploadOk = false;
                    $alertError = "Le fichier est trop volumineux (max : 500ko)";
                }

                if ($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg") {
                    $uploadOk = false;
                    $alertError = "Uniquement JPG, JPEG ou PNG";
                }

                if ($uploadOk) {
                    if(move_uploaded_file($_FILES["picture"]['tmp_name'], $targetFile));
                    $file = $_POST['name'] . '-' . $now . "." . $imgFileType;
                } else {
                    $uploadOk = false;
                    $alertError = "Echec du telechargement de l'image";
                }

            }
        } catch (Exception $e) {

            var_dump($e->getMessage());
            $alertError = "Echec de la publication de l'oeuvre";
        }

        $request =  $db->prepare('INSERT INTO artwork (artwork_name, artwork_description, artwork_artist, artwork_price, artwork_picture) VALUES (?, ?, ?, ?, ?)');

        $request->execute([
            $_POST['name'],
            $_POST['summary'],
            $_POST['artist'],
            $_POST['price'],
            $file
        ]);

        $alertSuccess = "L'oeuvre du nom de " . $_POST['name'] . " à bien etait ajouter";
    }
}

include('alert.php');
?>

<h1>Partage une oeuvre</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Nom de l'oeuvre :</label>
        <input value="<?= $valueName ?>" type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="summary" class="form-label">Description :</label>
        <textarea class="form-control" id="summary" name="summary" rows="3"><?= $valueSummary ?></textarea>
    </div>
    <div class="mb-3">
        <label for="artist" class="form-label">Nom de l'artiste :</label>
        <input value="<?= $valueArtist ?>" type="text" class="form-control" id="artist" name="artist">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prix de l'oeuvre :</label>
        <input value="<?= $valuePrice ?>" type="number" class="form-control" id="price" name="price">
    </div>
    <div class="mb-3">
        <label for="picture" class="form-label">Photo de l'oeuvre :</label>
        <input type="file" class="form-control" id="picture" name="picture">
    </div>

    <button type="submit" class="btn btn-primary">Partager</button>
</form>




<?php
include('footer.php');


?>