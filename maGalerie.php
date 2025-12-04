<?php
include('head.php');
include('header.php');

if (!$_SESSION['user']) {
    header("location: signIn.php");
    exit();
}


include('alert.php');
?>

<h1>Ma galerie ArtSpace!</h1>
<h3>Toutes les oeuvres que tu a publier sont ici.</h3>





<?php
include('footer.php');


?>