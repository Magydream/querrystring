Création du menu

<?php
include_once(dirname(__FILE__)."/../src/cantine/plats.php");
include_once(dirname(__FILE__)."/../src/cantine/menu.php");

$tab = read_plats();
createRandomMenu($tab,7);
