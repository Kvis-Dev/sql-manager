<?php
include BASE . '/tpl/header.php';
$data = sql::_()->get_table_data($_GET['table']);
?>

Showing <?= sizeof($data[1]) ?> rows of <?= $data['count']; ?>

<?php
$limit = 50;
$showing = sizeof($data[1]);
$total = $data['count'];
$offset = 0;
if ($v = get($_GET['func'], 'limit')) {
    $limit = $v;
}
if ($v = get($_GET['func'], 'offset')) {
    $offset = $v;
}
$urlfunc = function($page) use ($limit, $offset) {
    return url($page + 1, $_GET['db'], $_GET['table'], ['limit' => $limit, 'offset' => $limit * ($page)]);
};

include BASE . '/tpl/pager.php';
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

include BASE . '/tpl/pager.php';

include BASE . '/tpl/footer.php';
?>