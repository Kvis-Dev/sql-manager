<?php

function get($arr, $key){
    if (isset($arr[$key]) && !empty($arr[$key])){
        return $arr[$key];
    }
    
    return null;
}

function url($name, $db, $table = '', $sys = '') {
    $url = '';
    if ($db) {
        $url = "/$db/";
    }
    if ($table) {
        $url = "/$db/$table/";
    }
    
    return "<a href='$url'>{$name}</a>";
}