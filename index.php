<?php

header('Content-Type: text/html; charset=utf-8');

session_start();

define('BASE', dirname(__FILE__));

include './inc/functions.php';

if (!get($_SESSION, 'login') && !get($_SESSION, 'password')) {
    if (get($_POST, 'login')) {
        $_SESSION['login'] = get($_POST, 'login');
        $_SESSION['password'] = get($_POST, 'password');
    } else {
        include './tpl/form.login.php';
        die;
    }
}

include './db/inc.php';


$requri = trim($_SERVER['REQUEST_URI'], '/\\ ');

$requri_arr = array_filter( explode('/', $requri));

if ( sizeof($requri_arr) == 1 ) {
    $_GET['db'] = $requri_arr[0];
    include './pages/tables.php';
} else if ( sizeof($requri_arr) == 2 ) {
    $_GET['db'] = $requri_arr[0];
    $_GET['table'] = $requri_arr[1];
    include './pages/table_data.php';
} else {
    include './pages/databases.php';
}

