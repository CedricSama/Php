<?php
//Tableaux numériques

$etudiants = array('Bob', 'Marie', 'Adrien', 'Marc', 2, true);
$etudiants2 = ['Bob', 'Marie', 'Adrien', 'Marc', 2, false];

print_r($etudiants);

echo $etudiants[2];

$employes = array('prenom' => 'cedric', 'nom' => 'salaun', 'age' => 34, 'employeur' => array('societe' => 'Freelance', 'adresse' => '103 rue de la chapelle', 'ville' => 'Argenteuil'));

echo ' '.$employes['prenom'].' '.$employes['age'].'<br>';
echo ' '.$employes['employeur']['societe'].'<br>';
//blablabla

var_dump($employes);

foreach($employes as $key => $employe){
    if(is_array($employe)){
        foreach($employe as $k => $emp){
            echo $k.': '.$emp.'<br>';
        }
    }else{
        echo $key.': '.$employe.'<br>';
    }
}