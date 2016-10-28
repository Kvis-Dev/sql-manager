<?php

$dbname = get($_POST, 'dbname');
$charset = get($_POST, 'charset');
$charset0 = explode('_', $charset)[0];

$sql = "CREATE DATABASE `$dbname` CHARACTER SET $charset0 COLLATE $charset;";

if (sql::_()->query($sql)) {
    header('Location: /');
}