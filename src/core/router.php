<?php
$page = 'accueil.php';
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'plats':
            $page = "plats.php";
            break;
        case "menus":
            $page = "menus.php";
            break;
        case "createMenu":
            $page = "createMenu.php";
            break;
        case 'createFood':
            $page = "createFood.php";
            break;
        case 'connexion':
            $page = "connexion.php";
            break;
        default:
            break;
    }
}
include_once(dirname(__FILE__) . '/../../pages/' . $page);
