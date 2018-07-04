<?php


$str = 'Hello world and other guys';

function rev($str) {
    $arr = explode(' ', $str);
    $sum = 0;

    foreach ($arr as $elem) {

        $sum += strlen($elem);
        $res = $sum / count($arr);
    }

    return $res;
}


echo rev($str);