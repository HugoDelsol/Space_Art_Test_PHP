<?php
include('head.php');
include('header.php');

if (isset($_POST['pseudo'])) {

    if (
        empty($_POST["pseudo"]) ||
        empty($_POST["password"])
    ) {

        $alertError = "Veuilliez renseigner tout les champs!";
    }

    try {

        $pseudoSign = $_POST['pseudo'];
        $pswrdSign = $_POST['password'];

        $request = $db->prepare("SELECT * FROM user WHERE user_pseudo = ?");
        $request->execute([$pseudoSign]);
        $userSign = $request->fetch(PDO::FETCH_ASSOC);

        var_dump($userSign);

        if (!$userSign or !password_verify($pswrdSign, $userSign["user_password"])) {

            $alertError = "Pseudo ou mot de passe incorrect";
        } else {

            $_SESSION["user"] = [

                "id" => $userSign['uder_id'],
                "pseudo" => $userSign["user_pseudo"],
                "email" => $userSign["user_mail"],
                "isAdmin" => false
            ];

            header("location: index.php");
            exit;
        }

    } catch (Exception $e) {

        var_dump($e->getMessage());
        $alertError = "Echec de la connexion";
    }
}

include('alert.php');

?>



<h1>Connexion</h1>


<form action="" method="post">
    <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" value="" class="form-control" id="pseudo" name="pseudo">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" value="" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Connexion</button>
</form>



<?php
include('footer.php');


?>