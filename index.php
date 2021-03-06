<?php

header('Content-Type: text/html; charset=utf-8');

session_start();

define('BASE', dirname(__FILE__));

include './inc/functions.php';

if (!get($_SESSION, 'login') && !get($_SESSION, 'password')) {
    if (get($_POST, 'login')) {
        if (mysqli_connect('127.0.0.1', get($_POST, 'login'), get($_POST, 'password'))) {
            $_SESSION['login'] = get($_POST, 'login');
            $_SESSION['password'] = get($_POST, 'password');
            header('Location:' . $_SERVER['REQUEST_URI']);
        }
    }
    include './tpl/form.login.php';
    die;
}

include './db/inc.php';


$requri = explode('?', trim($_SERVER['REQUEST_URI'], '/\\ '))[0];


$_GET['func'] = [];

if (strpos($requri, ':') !== false) {
    $requri_arr_f = explode(':', $requri);

    foreach ($requri_arr_f as $fnc) {
        $pm = preg_match("/[\w]+\((.*?)\)/", $fnc);
        // var_dump($pm);
        if ($pm) {
            $fname = explode('(', $fnc)[0];

            $fargs = explode(',', explode('(', substr($fnc, 0, -1))[1]);

            if (sizeof($fargs) == 1) {
                $_GET['func'][$fname] = $fargs[0];
            } else {
                $_GET['func'][$fname] = $fargs;
            }
        }
    }
}

$requri_arr = array_filter(
        explode('/', explode(':', $requri)[0]
        )
);
if (sizeof($requri_arr) > 1) {
    $_GET['db'] = $requri_arr[0];
}
$sql = get($_GET, 'sql');

$db = get($_GET, 'db');
if ($sql && get($_GET['func'], 'system') !== 'sql') {

//    die;
    if ($db) {
        header("Location: /$db/:system(sql)?sql=" . $sql);
    } else {
        header("Location: /:system(sql)?sql=" . $sql);
    }
}

if (get($_GET['func'], 'system')) {

    if (sizeof($requri_arr) > 1) {
        $_GET['db'] = $requri_arr[0];
        sql::_()->query('USE `' . $requri_arr[0] . '`');
    }

    $sfile = './pages/system/' . join('.', (array) get($_GET['func'], 'system')) . '.php';

    include $sfile;
} else if (sizeof($requri_arr) == 1) {
    $_GET['db'] = $requri_arr[0];
    sql::_()->query('USE `' . $requri_arr[0] . '`');

    include './pages/tables.php';
} else if (sizeof($requri_arr) == 2) {
    $_GET['db'] = $requri_arr[0];
    $_GET['table'] = $requri_arr[1];
    sql::_()->query('USE `' . $requri_arr[0] . '`');

    include './pages/table_data.php';
} else {
    include './pages/databases.php';
}

