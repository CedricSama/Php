<?php
//autoloader
//connexion a la base de donnée
//include ('Models/db.php'); continue le script malgres une erreur.
require_once('../Model/db.php');
require_once('../Controller/functions.php');
require_once('../Model/User.php');
//Récupérer les données du formulaire
$keys = ['nom', 'prenom', 'email', 'login', 'password'];
$validators = ['extentions' => ['jpg', 'jpeg', 'png', 'gif'], 'size' => '2000000', 'file_name '=>'avatar', 'dir'=>'upload'];
$datas = insertDatasForm($_POST, $keys);
$messages = [];
$password_valide = passwordValidator($_POST['password']);
$email_valide = emailValidator($datas['email']);
$login_count = findOneUserBy('login', $datas['login'], true);
$email_count = findOneUserBy('email', $datas['email'], true);
//print_r($datas);
//print_r($_FILES);


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
    setFlash($messages);
    header('Location: ../index.php');
}elseif(!$password_valide){
    $messages[] = "le mots de passe est trop court, il faut au moins 8 caractères";
}
if(!$email_valide){
    $messages[] = "l'adresse email est invalide";
}
if($login_count){
    $messages[] = "Ce loggin est non disponible.";
}
if($email_count){
    $messages[] = "Email déjà utilisé.";
};

if(isset($_SESSION) == false){
    session_start();
}
$_SESSION['data_form'] = $datas;
//if(count($messages) == 0){
//    print_r(upload($_FILES, $validators));
//    die();
//    $infos_upload = upload($_FILES, $validators);
//
//    if($infos_upload['error']){
//        setFlash($infos_upload['messages'], 'error');
//        header('Location: ../index.php');
//    }else{
//        $datas['avatar_path'] = $infos_upload['file_name'];
//    addUser($datas);
//    $messages[] = "Super !";
//    setFlash($messages, 'success');
//    unset($_SESSION['data_form']);
//    $_SESSION['register'] = true;}
//}else{
//    setFlash($messages);
//}
//mysqli_close($db);
//header('Location: ../index.php');
if(count($messages)==0) {
    addUser($datas);
    $messages[] = "Super !";
    setFlash($messages,'success');
    unset($_SESSION['datas_form']);
    $_SESSION['register'] = true;
} else {
    setFlash($messages);
}
// Fermeture connexion DB
mysqli_close($db);
header('Location: ../index.php');

//verifier qu'aucun champ n'est vide  --------------------------------v
//verifier le format de l'adresse email ------------------------------v
//verifier la longeur du mot de passe au moins 9charactere -----------v
//verifier verifier l'unicité du login
//verifier verifier l'unicité de l'email
//si tout est ok
//insertion des données dans la bd