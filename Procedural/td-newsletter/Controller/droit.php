<?php
$id = isset($_GET['id']) && is_numeric($_GET['id'])? $_GET['id'] : null;
$is_admin = isset($_GET['is_admin']) && is_numeric($_GET['is_admin']) ? $_GET['is_admin'] : false ;
if(empty($id)){
    header('Location: ../backend/index.php');
    exit();
}
require_once ('session_check.php');
require_once ('../Model/db.php');
require_once ('../Model/User.php');
require_once ('../Controller/functions.php');

$messages = ['Misa à jour effectuée'];
setAdmin($is_admin, $id);
setFlash($messages, 'primary');
header('Location: ../backend/gestion.php');