<?php

$etat_civil = isset($_POST['etat_civil'])? $_POST['etat_civil'] : null;
$animaux = isset($_POST['animaux'])? $_POST['animaux'] : null;

if(!empty($etat_civil)){
    setcookie('etat_civil', $etat_civil, time()+60*60*24*7);
    header('Location: bienvenue.php');
}
if(!empty($animaux)){
    $animauxList = implode('-', $animaux);
    $animauxSerialize = serialize($animaux);
    setcookie('animaux', $animauxList, time()+60*60*24*10);
    header('Location: bienvenue.php');
}else{
    setcookie('animaux', null, time()-60*60*24*10);
}
