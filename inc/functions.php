<?php

function get($arr, $key){
    if (isset($arr[$key]) && !empty($arr[$key])){
        return $arr[$key];
    }
    
    return null;
}

function url($name, $db, $table = '', $func = array()) {
    $url = '';
    if ($db) {
        $url = "/$db/";
    }
    if ($table) {
        $url = "/$db/$table/";
    }
    
    foreach ($func as $fn => $fv) {
        $url .= ':' . $fn . '(' . join(',', (array) $fv) . ')';
    }
    
    return "<a href='$url'>{$name}</a>";
}