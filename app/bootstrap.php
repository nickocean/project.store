<?php

require_once SRC . '/View.php';
require_once SRC .'/Session.php';
require_once SRC .'/Controller.php';
require_once SRC .'/Router.php';
require_once SRC .'/Model.php';
require_once SRC .'/Db.php';
require_once SRC .'/Log.php';

function pre($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}