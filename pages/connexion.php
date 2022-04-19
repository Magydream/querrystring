<?php
include_once './src/cantine/plats.php';
$user = 'admin';
$passeword = 'admin';
if (isset($_POST['connexion']) && $_POST['connexion'] === 'connect'){
    if (isset($_POST['user']) && $_POST['user'] === $user){
        if (isset($_POST['password']) && $_POST['password'] === $passeword){
            session_start();
            dump($_SESSION);
        }
    }

}



validate_create_form();
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>?page=connexion" method="post">
<input type="text" placeholder="Nom d'utilisateur" required>
<input type="password" placeholder="Mot de passe" required >
<input type="submit" value="Se connecter" name="connexion">
</form>



