<?php
include BASE . '/tpl/header.php';
?>
List tables

<ul>
<?php
foreach (sql::_()->get_tables()[1] as $db) {
    print '<li>' . url($db[0],$_GET['db'],$db[0]) . '</li>';
}
?>
</ul>
<?php
include BASE . '/tpl/footer.php';
?>