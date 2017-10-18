<?php
    require_once('vendor/autoload.php');
    //instentier une Personne
    $mitch = new \POO\Users\Person("Mitch");
    $nico = new \POO\Users\Person("Nico");
    $roger = new \POO\Users\Person("Roger");
    $terrence = new \POO\Users\Person("Terrence");
    $equipe_carrefour = new \POO\Users\Equipe();
    $equipe_carrefour -> add($mitch);
    $equipe_carrefour -> add($nico);
    $equipe_carrefour -> add($roger);
    $equipe_carrefour -> add($terrence);
    $membres_equipe_carrefour = $equipe_carrefour -> getMembers();
    echo "Les membres de l'équipe sont: ".PHP_EOL;
    foreach($membres_equipe_carrefour as $member){
        //$members_equipe_carrefour
        echo $member.PHP_EOL;
    }
    //var_dump($mitch);
    //var_dump($equipe_carrefour);
    $bubu = new \POO\Users\Person('Bubu');
    $carrefour = new \POO\Societe($equipe_carrefour);
    $carrefour ->embaucher($bubu);
    $membres_equipe_carrefour = $equipe_carrefour -> getMembers();
    foreach($membres_equipe_carrefour as $membre){
        echo $membre.PHP_EOL;
    }
    
    
    $carrefour = new \POO\Societe($equipe_carrefour);
    var_dump($carrefour);