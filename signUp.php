<?php
include('head.php');
include('header.php');

if (isset($_POST["pseudo"])) {

    if (empty($_POST["pseudo"]) || empty($_POST["email"]) || empty($_POST["password"])) {

        $alertSuccess = "Veuillez Remplir tout les champs !";
        
    } else {

        try {

            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $pswrd = $_POST['password'];

            $request = $db->prepare("SELECT * FROM user WHERE user_pseudo = ? OR user_mail = ?");
            $request->execute([$pseudo, $email]);
            $user = $request->fetch(PDO::FETCH_ASSOC);

            if ($user) {

                $alertError = "Un nom ou email a deja un compte";

            } else {

                $request = $db->prepare("INSERT INTO user (user_pseudo, user_mail, user_password) VALUES (?, ?, ?)");
                $passwordHash = password_hash($pswrd, PASSWORD_DEFAULT);
                $request->execute([$pseudo,$email,$passwordHash]);

                $_SESSION['user'] = [
                    "pseudo" => $pseudo,
                    "email" => $email,
                    "isAdmin" => null
                ];

                header("Location: index.php");
                exit();

            }
        } catch (Exception $e) {

            var_dump($e->getMessage());
            $alertError = "Un probleme est survenue lors de la crétion du compte !";
        }
    }
}

include("alert.php");
?>



<h1>Créer ton compte !</h1>


<form action="" method="post">
    <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" value="" class="form-control" id="pseudo" name="pseudo">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input value="" type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" value="" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Valider</button>
</form>



<?php
include('footer.php');


?>