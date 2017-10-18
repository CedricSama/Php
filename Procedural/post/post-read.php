<?php
//Etape 1  ==> récupérer données du formulaire
//Etape 2  ==> verifier le champs login renseigné
//Etape 3  ==> verifier le mot de passe == "toto"
//Etape 4  ==> si ok >
//                    demmarer une session
//                      > stocker les info
//                          > rediriger vers bienvenue.php.

$log = $_POST['login'];
$pass = $_POST['password'];

isset($log)? $login = $log : $login = null;
isset($pass)? $password = $pass : $password = null;

if(empty($login)){
    header('Location: post.php?error=1');
}
elseif(empty($password) || $password != 'toto'){
    header('Location: post.php?error=2');
}
else{
    session_start();
    $_SESSION['is_logged'] = true;
    $_SESSION['login'] = ucfirst($login);
    header('Location: bienvenue.php');
}

