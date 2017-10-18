<?php
// connexion a la db ------------------------------------v
// recupéré les données du formulaire -------------------v
// vérifier les champs vide -----------------------------v
// identifier le user via un req sql --------------------v
// si ok demarrer une session mise en session is logged = ture
// sinon redirection vers le formulaire avec un message d'erreur
require_once('../Model/db.php');
require_once('../Model/User.php');
require_once('../Controller/functions.php');

//$loginPost = isset($_POST['login'])? $_POST['login'] : null;
//$passwordPost = isset($_POST['password'])? $_POST['password'] : null;
//$data_clean = extract_data_form();
$messages = [];
$datas = insertDatasForm($_POST, ['login', 'password']);

if(in_array(null, $datas)){
    $messages[] = "Tous les champs sont obligatoires.";
    setFlash($messages,'error');
    header('Location: ../backend/index.php');
    exit();
}
$user_count = login($datas['login'], $datas['password'], 'email');
$user = login($datas['login'], $datas['password'], 'email',false);
$user = mysqli_fetch_assoc($user);

if($user_count && $user['is_admin']){
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['is_admin'] = true;
    $_SESSION['prenom'] = true;
    $_SESSION['nom'] = true;
    $_SESSION['login'] = true;
    header('Location: ../backend/gestion.php');
}else{
    $messages[]="Vous n'etes pas autorisé à consulter cette page";
    setFlash($messages);
    header('Location: ../backend/index.php');
}
mysqli_close($db);
//
//if($count = 1 && count($messages) == 0){
//    $messages[] = "Super !";
//    $resultat = mysqli_num_rows($res);
//    setFlash($messages,'success');
//    $_SESSION['logged'] = true;
//}else{
//    setFlash($messages);
//    header('Location: ../index.php');
//}
//$password = sha1($datas['password']);
//$sql = "SELECT * FROM user WHERE login = $datas['login'] AND password = $datas['password']";
//$resultat = null;
//$res = mysqli_query($db, $sql) or die($sql.'=>'.mysqli_error($db));
//if(!$loginPost){
//    $messages[] = "Login manquant.";
//}
//if(!$passwordPost){
//    $messages[] = "Indiquez votre mots de passe.";
//}