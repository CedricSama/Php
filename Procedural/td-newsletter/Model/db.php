<?php

// CONSTANTES

define('DB_NAME', 'newslatter_db');
define('DB_USER', 'root');
define('DB_PASSWORD', null);
define('DB_HOST', 'localhost');
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)or die ('Error: '.mysqli_error($db));
/*if($db){
    echo "Database connected";
}
die();*/