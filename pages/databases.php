<?php
include BASE . '/tpl/header.php';
?>
List databases

<ul>
<?php

foreach (sql::_()->get_databases()[1] as $db) {
    print '<li>' . url($db[0],$db[0]) . '</li>';
}
?>
</ul>
<?php
include BASE . '/tpl/footer.php';
?>