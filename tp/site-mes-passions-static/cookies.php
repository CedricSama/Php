<?php

$civil = isset($_POST['civil'])? $_POST['civil'] : null;
$hobbies = isset($_POST['hobbies'])? $_POST['hobbies'] : null;

if(!empty($civil)){
    setcookie('etat_civil', $civil, time() + 60 * 60 * 24);
    header('Location: vos-passions.php');
}else{
    setcookie('etat_civil', null, time() - 60 * 60 * 24);
}
if(!empty($hobbies)){
    $hobbiesSerialize = serialize($hobbies);
    setcookie('passions', $hobbiesSerialize, time() + 60 * 60 * 24);
    header('Location: vos-passions.php');
}else{
    setcookie('passions', null, time() - 60 * 60 * 24);
    header('Location: a-propos-de-vous.php?error=1');
}
