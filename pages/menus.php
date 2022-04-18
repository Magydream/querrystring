<?php
include_once(dirname(__FILE__)."/../src/cantine/menu.php");

?>
<table class='table table-dark table-striped'>
    
<?php
    $tab = read_menu();
    foreach ($tab as $key => $menu) {
        if ($key === 0):
            ?>
            <thead>
                <th>Entrée</th>
                <th>Plat</th>
                <th>Dessert</th>
            </thead>
            <?php
        endif;
        echo "<tr>";
        foreach ($menu as $plat) {
            echo "<td>$plat</td>";
        }
        echo "</tr>";
    }
?>
</table>