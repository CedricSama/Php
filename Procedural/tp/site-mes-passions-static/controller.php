<?php
$email = isset($_POST['email'])? $_POST['email']: null;
$password = isset($_POST['password'])? $_POST['password']: null;
$civilCookie = isset($_COOKIE['etat_civil'])? true: false;
$hobbiesCookie = isset($_COOKIE['passions'])? true: false;
//print_r($civilCookie);
//echo $civilCookie;
if(empty($email)){
    header('Location: index.php?error=1');
}elseif(empty($password) || $password != "toto"){
    header('Location: index.php?error=2');
}else{
    if($civilCookie || $hobbiesCookie){
        $_SESSION['logged'] = true;
        header('Location: vos-passions.php?success=1');
    }else{
        session_start();
        $_SESSION['logged'] = true;
        header('Location: a-propos-de-vous.php?success=1');
    }
}