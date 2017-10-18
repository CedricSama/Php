<?php
require_once ('./User.php');

//Instencier un objet de type User

$michel = new User();
$michel -> setEmail('michel@gmail.com');
$titi = new User();
$titi -> setEmail('titi@gmail.com');

$michel -> setPassword('012346079');

//var_dump($michel);
echo $titi->getEmail();
echo $michel->getPassword();
