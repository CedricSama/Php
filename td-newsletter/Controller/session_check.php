<?php

session_start();
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != true){
    header('Location: ../backend/index.php');
}
