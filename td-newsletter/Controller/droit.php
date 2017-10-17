<?php
$id = isset($_GET['id']) && is_numeric($_GET['id'])? $_GET['id'] : null;
if(empty($id)){
    header('Location: ../backend/index.php');
}
