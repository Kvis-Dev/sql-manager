<?php
include BASE . '/tpl/header.php';
?>

Data

<table class="table table-hover table-responsive table-striped table-bordered">
    <thead>
        <tr>
            <?php
            $data = sql::_()->get_table_data($_GET['table']);
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
                echo $db_data;
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