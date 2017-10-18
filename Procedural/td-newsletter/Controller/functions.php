<?php
/**
 * Recuperer et nettoyer les données d'un formulaire
 * @param array $datasForm
 * @param array $keys
 * @return array|bool
 */
function insertDatasForm($datasForm, $keys){
    $datas = [];
    foreach($keys as $value){
        if(array_key_exists($value, $datasForm) == false){
            return false;
        }
    }
    foreach($datasForm as $key => $value){
        if(empty($value)){
            $datas[$key] = null;
        }elseif($key == 'password'){
            $datas[$key] = sha1(trim($value));
        }else{
            $datas[$key] = trim(htmlentities($value));
        }
    }
    return $datas;
}
/**
 * Ecrire dans la session du user un ou n message(s)
 * @param $messages
 * @param string $type = 'danger
 */
function setFlash($messages, $type = 'danger'){
    if(!isset($_SESSION)){
        session_start();
    }
    $_SESSION['flash'] = ['messages' => $messages, 'type' => $type];
}
function getFlash(){
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['flash'])){
        $html = '<div class="alert alert-'.$_SESSION['flash']['type'].'" role="alert" style="margin-bottom:40px">';
        foreach($_SESSION['flash']['messages'] as $message){
            $html .= '<p style="margin: 10px 0">'.$message.'</p>';
        }
        $html .= '</div>';
        unset($_SESSION['flash']);
        return $html;
    }
    return false;
}
/**
 * Vérifie le mots de passe superieur a 8 caractères
 * @param $password
 * @return bool
 */
function passwordValidator($password){
    $is_valid = strlen($password) >= 9? true : false;
    return $is_valid;
}
/**
 * Test le format & test le domaine de l'email a bien un service DNS MX déclaré
 * @param $email
 * @return bool
 */
function emailValidator($email){
    $is_valid = filter_var($email, FILTER_VALIDATE_EMAIL)? true : false;
    if($is_valid){
        $dom = explode('@', $email);
        $domaine = $dom[1];
        $is_valid = checkdnsrr($domaine, 'MX')? true : false;
    }
    return $is_valid;
}
/**
 * Recuperation d'avatar avec son controle
 * @param $file
 * @param array $validators
 * @return array
 */
function upload($file, $validators){
    $error = false;
    $messages = [];
    // Verif du code de réponse de $_FILES == 0
    if($file[$validators['file_name']]['error'] != 0){
        $error = true;
        $messages[] = "une erreur s'est produite";
    }
    // Vérif des extensions de fichier autorisées
    $extensions = $validators['extensions'];
    $extension = explode('.', $file[$validators['file_name']]['name']);
    //print_r($extension);
    // toto.titi.titi.jpg
    $extension = end($extension);
    if(in_array($extension, $extensions) == false){
        $error = true;
        $messages[] = "L'extension $extension n'est pas autorisée";
    }
    // Vérif du poids du fichier > max 2Mo
    if($file[$validators['file_name']]['size'] > $validators['size']){
//    if($file['avatar']['size'] > 500000) {
        $error = true;
        $messages[] = "Votre fichier doit être inférieur ou égal à 2Mo";
    }
    // Donner un nom unique au fichier avant de le télécharger
    $fileNameUnique = sha1(uniqid()).'.'.$extension;
    $fileNameUniquePath = '../'.$validators['dir'].'/'.$fileNameUnique;
    // Test > vérifier si le dossier uploads existe déjà, si non le créer
    if(is_dir('../'.$validators['dir']) == false){
        mkdir('../'.$validators['dir'].'/', 777);
    }
    // Si tout est ok : déplacement du fichier de la mémoire temporaire vers repertoire final upload
    if($error == false){
        move_uploaded_file($file[$validators['file_name']]['tmp_name'], $fileNameUniquePath);
    }
    // (option: alerter si un fichier avec ce nom existe déjà)
    // Return tableau avec les diverses infos concernant le processus d'upload
    $info_upload = [
        'file_name'=> $fileNameUnique,
        'file_name_path'=> $fileNameUniquePath,
        'message' => $messages,
        'error' => $error
    ];
    return $info_upload;
}
///**
// * Recuperation d'avatar avec son controle, encodage, criptage & path
// * @param $file
// * @param array $extentions default =['jpg', 'jpeg', 'png', 'gif']
// * @param number $size default = 2000000
// * @param string $encode default = sha1(uniqid()).'.'
// * @param string $path default = '../upload/'
// * @return array
// */
//function upload($file, $extentions = null, $size = null, $encode = null, $path = null){
//    $error = false;
//    $messages = [];
//    if($extentions == null){
//        $extentions = ['jpg', 'jpeg', 'png', 'gif'];
//    }
//    if($size == null){
//        $size = 2000000;
//    }
//    if($encode == null){
//        $encode = sha1(uniqid()).'.';
//    }
//    if($path == null){
//        $path = '../upload/';
//    }
//    $extention = explode('.', $file['avatar']['name']);
//    $extention = end($extention);
//    $fileNameUnique = $encode.$extention;
//    $fileNameUniquePath = $path.$fileNameUnique;
//    if($_FILES['avatar']['error'] != 0){
//        $error = true;
//        $messages[] = "Une erreur s'est produite";
//    }
//    if(in_array($extention, $extentions) != true){
//        $error = true;
//        $messages[] = "L'extention $extention n'est pas autorisée";
//    }
//    if($_FILES['avatar']['size'] > $size){
//        $error = true;
//        $messages[] = "Votre fichier doit être inférieur ou égal à 2Mo.";
//    }
//    if(!is_dir($path)){
//        mkdir($path, 777);
//    }
//    if(file_exists($path.($_FILES['avatar']['name']))){
//        $error = true;
//        $messages[]='Le fichier existe déjà.';
//    }
//    if(!$error){
//        move_uploaded_file($_FILES['avatar']['tmp_name'], $fileNameUniquePath);
//    }
//
//    return $messages;
//    // Vérif code reponse $_FILES------------------------------------v
//    // Vérif des extentions de fichiers autorisées-------------------v
//    // Vérif du poids du fichier < max 2Mo---------------------------v
//    // Donner un nom unique au fichier avant de le telecharger-------v
//    // (option : alerter si un fichier existe deja
//    // si tout est ok : deplacement du fichier de la memoire temporaire vers repertoire final upload
//    // Return tableau avec les divers infos concernant le preocessus d'upload
//}
///**
// * Recuperation d'avatar avec son controle, encodage, criptage & path
// * @param string $file
// * @param array $validator
// * @return array
// */
//
//function upload($file, $validator = null){
//    $error = false;
//    $messages = [];
//    if($validator == null){
//        $extentions = ['jpg', 'jpeg', 'png', 'gif'];
//        $size = 2000000;
//        $encode = sha1(uniqid()).'.';
//        $path = '../upload/';
//        $fileName = $file['avatar']['name'];
//    }else{
//        $extentions = $validator['extentions'];
//        $size = $validator['size'];
//        $path = '../'.$validator['dir'];
//        $fileName = $file[$validator['name']];
//        $encode = sha1(uniqid()).'.';
//    }
//    $extention = explode('.', $fileName);
//    $extention = end($extention);
//    $fileNameUnique = $encode.$extention;
//    $fileNameUniquePath = $path.$fileNameUnique;
//    if($fileName['error'] != 0){
//        $error = true;
//        $messages[] = "Une erreur s'est produite";
//    }
//    if(in_array($extention, $extentions) != true){
//        $error = true;
//        $messages[] = "L'extention $extention n'est pas autorisée";
//    }
//    if($fileName['size'] > $size){
//        $error = true;
//        $messages[] = "Votre fichier doit être inférieur ou égal à 2Mo.";
//    }
//    if(!is_dir($path)){
//        mkdir($path, 777);
//    }
//    if(file_exists($path.($fileName['name']))){
//        $error = true;
//        $messages[]='Le fichier existe déjà.';
//    }
//    if(!$error){
//        move_uploaded_file($fileName['tmp_name'], $fileNameUniquePath);
//    }
//
//    return $messages;
//    die();

