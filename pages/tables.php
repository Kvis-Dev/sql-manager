<?php
include BASE . '/tpl/header.php';
?>
List tables

<table class="table table-hover table-responsive table-striped table-bordered">
<?php
foreach (sql::_()->get_tables()[1] as $db) {
    print '<tr><td>' . url($db[0],$_GET['db'],$db[0]) . '</td></tr>';
}
?>
</table>
<?php
include BASE . '/tpl/footer.php';
?>