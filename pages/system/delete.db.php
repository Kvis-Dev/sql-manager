<?php

$dbname = get($_GET['func'], 'name');

$sql = "DROP DATABASE `$dbname`;";

if (sql::_()->query($sql)) {
    header('Location: /');
}