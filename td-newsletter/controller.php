<?php
/*$_POST['nom'];
$_POST['prenom'];
$_POST['email'];
$_POST['login'];
$_POST['password'];*/
isset($_POST['nom'])? $nom = $_POST['nom'] : $nom = null;
isset($_POST['prenom'])? $prenom = $_POST['prenom'] : $prenom = null;
isset($_POST['email'])? $email = $_POST['email'] : $email = null;
isset($_POST['login'])? $login = $_POST['login'] : $login = null;
isset($_POST['password'])? $password = $_POST['password'] : $password = null;

if(empty($prenom)){
    header('Location: index.php?error=1');
}elseif(empty($login)){
    header('Location: index.php?error=2');
}elseif(empty($password)){
    header('Location: index.php?error=3');
}elseif(empty($email)){
    header('Location: index.php?error=4');
}
/*else{
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['prenom'] = ucfirst($prenom);
    header('Location: ');
}*/