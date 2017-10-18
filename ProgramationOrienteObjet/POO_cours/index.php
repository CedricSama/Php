<?php
    require_once('./User.php');
    require_once('./Product.php');
//Instencier un objet de type User
// $michel = new User();
// $michel -> setEmail('michel@gmail.com');
// $titi = new User();
// $titi -> setEmail('titi@gmail.com');
//
// $michel -> setPassword('012346079');
//
// //var_dump($michel);
// echo $titi->getEmail();
// echo $michel->getPassword();
    $basket_adidas = new Product();
    $basket_adidas -> setCodePays('de');
    $basket_adidas -> setPrixHt('100');
    var_dump($basket_adidas);
