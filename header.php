<?php

if (isset($_SESSION['user'])) {

    $idUser = ($_SESSION['user']['id']);
    var_dump($idUser);

    $request = $db->query("SELECT COUNT(_id_user) FROM `order` WHERE _id_user = $idUser ");
    $userShopData = $request->fetch(PDO::FETCH_ASSOC);
    var_dump($userShopData["COUNT(_id_user)"]);
}

?>

<nav style="
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1em 2em;
  background: linear-gradient(90deg, #1e1e2fff, #2a2a3d);
  font-family: 'Segoe UI', sans-serif;
  color: white;
  flex-wrap: wrap;
">
    <!-- Logo -->

    <a href="#" style="font-size: 1.5em; font-weight: bold; color: white; text-decoration: none;">

        <?php if (!isset($_SESSION['user'])) { ?>
            🔷 ArtSpace
        <?php } else { ?>
            <?= "👋" . "Bonjour" . " " . $_SESSION["user"]['pseudo'] ?>
        <?php } ?>
    </a>

    <!-- Menu (centré sur grand écran, en colonne sur petit écran) -->
    <div style="
    display: flex;
    gap: 1.5em;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-top: 0.5em;
  ">
        <a href="./" style="color: white; text-decoration: none; padding: 0.5em 0.3em;">Home</a>
        <a href="./galerie.php" style="color: white; text-decoration: none; padding: 0.5em 0.3em;">Exposer une œuvre</a>
        <a href="./maGalerie.php" style="color: white; text-decoration: none; padding: 0.5em 0.3em;">Ma galerie</a>
        <?php if (!isset($_SESSION['user'])) { ?>
            <a href="./signUp.php" style="color: white; text-decoration: none; padding: 0.5em 0.3em;">Inscription</a>
        <?php } ?>
    </div>

    <?php if (!isset($_SESSION['user'])) { ?>
        <!-- CTA Button -->
        <a href="./signIn.php" style="
    background-color: #00bfa685;
    color: white;
    text-decoration: none;
    padding: 0.6em 1.2em;
    border-radius: 6px;
    font-weight: bold;
    transition: background 0.3s;">
            Connexion
        </a>
    <?php } else { ?>
        <!-- CTA Button -->
        <div>
            <?php if (!$_SESSION['user']) { ?>
                <a href="./myShop.php?artworkId=<?= $_SESSION['user']['id'] ?>" style="margin-right: 1em;">Mon panier</a>
            <?php } else {  ?>
                <a href="./myShop.php?artworkId=<?= $_SESSION['user']['id'] ?>" style="margin-right: 1em;"><?= "Mon panier " . "(" . $userShopData["COUNT(_id_user)"] . ")" ?></a>
            <?php } ?>
            <a href="./index.php?logout=true.php" style="
    background-color: #bf002081;
    color: white;
    text-decoration: none;
    padding: 0.6em 1.2em;
    border-radius: 6px;
    font-weight: bold;
    transition: background 0.3s;">
                Deconnexion
            </a>
        </div>

    <?php } ?>
</nav>
<div style="width: 70vw; margin: auto;">