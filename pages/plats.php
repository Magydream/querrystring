<?php
    include_once(dirname(__FILE__)."/../src/cantine/plats.php");
?>

<table class='table table-dark table-striped'>
    <thead>
        <th scope='col'>
            Catégorie
            <a href='index.php?page=plats&tricat=<?php echo (isset($_GET['tricat']) && $_GET['tricat'] === 'asc') ?  'desc' :  'asc';?>' class="link-light">
                <?php echo (isset($_GET['tricat']) && $_GET['tricat'] === 'asc') ?  '<i class="bi bi-arrow-down-circle"></i>' :  '<i class="bi bi-arrow-up-circle"></i>';?>
            </a>
        </th>
        <th scope='col'>Nom du plat
            <a href='index.php?page=plats&tri=<?php echo (isset($_GET['tri']) && $_GET['tri'] === 'asc') ?  'desc' :  'asc';?>' class="link-light">
                <?php echo (isset($_GET['tri']) && $_GET['tri'] === 'asc') ?  '<i class="bi bi-arrow-down-circle"></i>' :  '<i class="bi bi-arrow-up-circle"></i>';?>
            </a>
        </th>
    </thead>
    <?php
        $tab = read_plats();
        if (isset($_GET['tri'])) {
            $aliments = tri_plats($tab, $_GET['tri']);
            foreach ($aliments as $key => $value) {
                echo "<tr><td>$value</td><td>$key</td></tr>";
            }
        } else {
            if (isset($_GET['tricat'])) {
                $tab = tri_categories($tab, $_GET['tricat']);
            }
        foreach ($tab as $key=>$value) {
                foreach ($value as $plat) {
                    echo "<tr><td>$key</td><td>$plat</td></tr>";
                }
            }
        }
    ?>
</table>