<?php

class User{
    //ATRIBUTS
    public $login;
    private $password;
    private $email;
    public $prenom;
    public $nom;
    public $is_admin;
    public $avatar_path;
    public $creat_at;
    private static $password_length;
    //METHODES
    /**
     * @param $email
     * @return $this
     * @throws Exception
     */
    public function setEmail($email){
        $is_valid = $this -> emailValidator($email);
        if($is_valid){
            $this -> email = $email;
        }else{
            throw new Exception("Format email invalide");
        }
        return $this;
    }
    /**
     * @return mixed
     */
    public function getEmail(){
        return $this -> email;
    }
    /**
     * @param $email
     * @return bool
     */
    private function emailValidator($email){
        $is_valid = filter_var($email, FILTER_VALIDATE_EMAIL)? true : false;
        if($is_valid){
            $dom = explode('@', $email);
            $domaine = $dom[1];
            $is_valid = checkdnsrr($domaine, 'MX')? true : false;
        }
        return $is_valid;
    }
    /**
     * @param $password
     * @return $this
     * @throws Exception
     */
    public function setPassword($password){
        $is_valid = $this -> passwordValidator($password);
        if($is_valid){
            $this -> password = $password;
        }else{
            throw new Exception("Format du password invalide (inferieur à 9 characteres)");
        }
        return $this;
    }
    /**
     * @return mixed
     */
    public function getPassword(){
        return $this -> password;
    }
    /**
     * @param $password
     * @return bool
     */
    private function passwordValidator($password){
        $is_valid = strlen($password) >= self::$password_length? true : false;
        return $is_valid;
    }
}

