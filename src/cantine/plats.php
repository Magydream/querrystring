<?php

/**
 * Tri les plats par ordre alphabétique
 *
 * @param array $plats le tableau des plats à trier
 * @param string $ordre asc pour ordre alphabétique sinon desc
 * @return array
 */
function tri_plats($plats, $ordre) {
    foreach ($plats as $key => $value) {
        foreach ($value as $aliment) {
            $aliments[$aliment] =  $key ;
        }
    }
    if ($ordre === 'asc') {
        ksort($aliments);
    } else {
        krsort($aliments);
    }
    return $aliments;
}

/**
 * Trie les plats par ordre alphabétique sur le nom de la catégorie du plat
 *
 * @param array $plats le tableau des plats à trier
 * @param string $ordre asc pour ordre alphabétique sinon desc
 * @return array
 */
function tri_categories($plats, $ordre) {
    if ($ordre === 'asc') {
         ksort($plats);
    } else {
        krsort($plats);
    }
    return $plats;
}

/**
 * Lit les plats du fichier csv
 *
 * @return array
 */
function read_plats() {
    $fp = fopen('src/datas/plats.csv', 'r');
    while ($data = fgetcsv($fp,null,";")) {
        $return[$data[0]][] = $data[1];
    }
    return $return;
}


/**
 * validate_create_form
 *
 * @return void
 */
function validate_create_form(){
    if (isset($_POST['submit'])) {
        $plats = read_plats();
        unset($_POST['submit']);
        $errors = [];
        if (!isset($_POST['category']) || $_POST['category'] === "") {
            $errors[] = "Vous devez choisir une categorie<br>";
        }
    
        if (!isset($_POST['name']) || $_POST['name'] === "") {
            $errors[] = "Vous devez choisir un plat<br> ";
        }
    
        $_POST['name'] = ucfirst(trim($_POST['name']));
        if (array_key_exists($_POST['category'], $plats)) {
            if (in_array(($_POST['name']), $plats[$_POST['category']])) {
                $errors[] = "Le plat existe déjà";
            }
        }
    
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo $error;
            }
        } else {
            if (($fp = fopen('src/datas/plats.csv', 'a')) === false) {
                echo "une erreur est survenue.<br>";
            } else {
                if ((fputcsv($fp, $_POST, ';')) === false) {
                    echo "une erreur est survenue.<br>";
                } else {
                    echo "Le plat est bien créé ! ";
                }
                fclose($fp);
            }
        }
    }
}

function dump($param){
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
}