<?php

namespace TODO\Services;

class Validator
{
    private $messages = [];

    public static $password_length =8;

    public function __construct(array $validators)
    {
        foreach($validators as $validator => $value) {
            $validator_method = "check";
            $validator_method .=ucfirst($validator);
            $this->$validator_method($value);
            // $this->checkEmail('titi@gmail.com')
        }
        return $this;
    }

    private function addMessage($message) {
        $this->messages[] = $message;
    }

    public function getMessages() {
        if(count($this->messages)>0) {
            return $this->messages;
        }
            return false;
    }

    private function checkEmail($email) {
        // Vérifier le format de l'adresse email
        $is_valid = true;
        if(filter_var($email,FILTER_VALIDATE_EMAIL) == false) {
            $is_valid = false;
            $this->addMessage("Email invalide: Format email incorrecte");
        }
        if($is_valid) {
            $domaine_email = explode("@",$email);
            // Vérifier le serveur MX du domaine
            if(checkdnsrr($domaine_email[1],'MX') == false) {
                $is_valid = false;
                $this->addMessage("Email invalide: Serveur MX indisponible");
            }
        }
    }

    private function checkPassword($password) {
        $is_valid = true;
        if(strlen($password)<static::$password_length) {
            $is_valid = false;
$this->addMessage('Mot de passe invalide: Mini '.static::$password_length.' caractères');
        }
       // return $is_valid;
    }

    private function checkEmpty($datas) {
        if(in_array(null,$datas)) {
            $this->addMessage("Tous les champs sont obligatoires");
        }
    }

}