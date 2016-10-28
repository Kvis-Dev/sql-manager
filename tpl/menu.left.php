<?php ?>
        <a href="#menu-toggle" id="menu-toggle"></a>

<ul class="sidebar-nav">
    
    <li class="sidebar-brand">

        <a href="/">
            Main page
        </a>
    </li>

    <?php
    foreach (sql::_()->get_databases()[1] as $db) {
        print '<li>' . url($db[0], $db[0]) . '</li>';

        if (get($_GET, 'db') == $db[0]) {
            ?>
            <ul>
                <?php
                foreach (sql::_()->get_tables()[1] as $db) {
                    print '<li>' . url($db[0], $_GET['db'], $db[0]) . '</li>';
                }
                ?>
            </ul>
            <?php
        }
    }
    ?>
</ul>

