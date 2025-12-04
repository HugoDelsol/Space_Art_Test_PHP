<?php
session_start();

if(isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
}

$alertError = null;
$alertSuccess = null;

try {

    $db = new PDO(
        'mysql:host=localhost;dbname=artspace;charset=utf8',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (Exception $e) {

    var_dump($e->getMessage());
    $alertError = "Echec de la connexion à la BDD";
}

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>ArtSpace</title>
</head>

<body >

    

