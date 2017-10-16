<?php
//autoloader

//connexion a la base de donnée
//include ('Models/db.php'); continue le script malgres une erreur.
require_once('../Model/db.php');
require_once('../Controller/functions.php');
//Récupérer les données du formulaire
$keys = ['nom', 'prenom', 'email', 'login', 'password'];
$datas = insertDatasForm($_POST, $keys);
$messages = [];
$password_valide = emailValidator($_POST['password']);
$email_valide = emailValidator($datas['email']);

//var_dump($datas);
if($datas == false){
    //on renvoie le user dans le formulaire car il essai d'appeler un scipte sans le valider
    // header('Location: ../index.php');
    $messages[] = "Vous n'etes pas autorisé !";
    setFlash($messages);
    header('Location: ../index.php');
    exit();
}
if(is_array($datas) && in_array(null, $datas)){
    $messages[] = "Tous les champs sont obligatoires";
}
if(!$password_valide){
    $messages[] = "le mots de passe est trop court, il faut au moins 8 caractères";
}
if(!$email_valide){
    $messages[] = "l'adresse email est invalide";
}

if(isset($_SESSION) == false){
    session_start();
}
$_SESSION['data_form'] = $datas;


setFlash($messages);
header('Location: ../index.php');

//verifier qu'aucun champ n'est vide
//verifier le format de l'adresse email
//verifier la longeur du mot de passe au moins 9charactere
//verifier verifier l'unicité du login
//verifier verifier l'unicité de l'email
//si tout est ok
//insertion des données dans la bd