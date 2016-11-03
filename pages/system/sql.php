<?php
include BASE . '/tpl/header.php';
?>
<?php
$q = '';

if (!$q) {
    $q = get($_GET, 'sql');
}
$data = sql::_()->result4x2(sql::_()->query($q, 1));
?>
<?php
include BASE . '/tpl/sql.php';
?>


<table class="table table-hover table-responsive table-striped table-bordered">
    <thead>
        <tr>
            <?php
            foreach ($data[0] as $db) {
                echo '<th>';
                echo $db->name;
                echo '</th>';
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data[1] as $db) {
            echo '<tr>';

            foreach ($db as $db_data) {
                echo '<td>';
                if (strlen($db_data) < 300 || get($_GET['func'], 'nostrip')) {
                    echo $db_data;
                } else {
                    echo substr($db_data, 0, 300) . '...';
                }
                echo '</td>';
            }
            echo '</tr>';
        }
        ?>
    </tbody>

</table>

<?php
include BASE . '/tpl/footer.php';
?>
