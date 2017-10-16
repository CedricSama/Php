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
        if(!$value){
            $datas[$key] = null;
        }elseif($key === 'password'){
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
        $hmtl = '<div class="alert alert-'.$_SESSION['flash']['type'].'" role="alert" style="margin-bottom:40px">';
        foreach($_SESSION['flash']['messages'] as $message){
            $hmtl .= '<p style="margin: 10px 0">'.$message.'</p>';
        }
        $hmtl .= '</div>';
        unset($_SESSION['flash']);
        return $hmtl;
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
function upload($file){
    $error = false;
    $messages = [];
    $extentions = ['jpg', 'jpeg', 'png', 'gif'];
    $extention = explode('.', $file['avatar']['name']);
    $extention = end($extention);
    if($_FILES['avatar']['error'] != 0){
        $error = true;
        $messages[] = "Une erreur s'est produite";
    }
    if(in_array($extention, $extentions) != true){
        $error = true;
        $messages[] = "L'extention $extention n'est pas autorisée";
    }
    print_r($messages);
    die();
    // Vérif code reponse $_FILES
    // Vérif des extentions de fichiers autorisées
    // Vérif du poids du fichier < max 2Mo
    // Donner un nom unique au fichier avant de le telecharger
    // (option : alerter si un fichier existe deja
    // si tout est ok : deplacement du fichier de la memoire temporaire vers repertoire final upload
    // Return tableau avec les divers infos concernant le preocessus d'upload
}
