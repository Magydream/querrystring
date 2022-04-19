<?php
include_once './src/cantine/plats.php';
session_start();
$_SESSION['user'] = 'admin';
session_unset();
dump($_SESSION);
validate_create_form();
?>
<form action="<?= $_SERVER['PHP_SELF'] ?>?page=createFood" method="POST">
    <label for="category">
        Choisissez le type de plat
    </label>
    <select name="category" id="">
        <option value="">
            Veuillez choisir une catégorie
        </option>
        <option value="entrée" <?= (isset($_POST['category']) && $_POST['category'] === "entrée") ? "selected" : "" ?>>
            Entrée
        </option>
        <option value="plat" <?= (isset($_POST['category']) && $_POST['category'] === "plat") ? "selected" : "" ?>>
            Plat principal
        </option>
        <option value="dessert" <?= (isset($_POST['category']) && $_POST['category'] === "dessert") ? "selected" : "" ?>>
            Dessert
        </option>
    </select>
    <label for="name">
        Nom du plat
    </label>
    <input type="text" name="name" id="name" value="<?= (isset($_POST['name']) && $_POST['name'] !== "") ? $_POST['name'] : "" ?>">
    <input type="submit" name="submit" value="createfood">
</form>