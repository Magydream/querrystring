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