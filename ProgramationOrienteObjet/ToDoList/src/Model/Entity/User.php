<?php
    namespace TODO\Model\Entity;
    class User{
        private $id_user;
        private $login;
        private $email;
        private $password;
        private $nom;
        private $prenom;
        private $is_admin;
        private $created_at;
        private $updated_at;
        /**
         * @return mixed
         */
        public function getIdUser(){
            return $this -> id_user;
        }
        /**
         * @param mixed $id_user
         */
        public function setIdUser($id_user){
            $this -> id_user = $id_user;
        }
        /**
         * @return mixed
         */
        public function getLogin(){
            return $this -> login;
        }
        /**
         * @param mixed $login
         */
        public function setLogin($login){
            $login = trim($login);
            $this -> login = $login;
        }
        /**
         * @return mixed
         */
        public function getEmail(){
            return $this -> email;
        }
        /**
         * @param mixed $email
         */
        public function setEmail($email, $redirection){
            $is_valid = filter_var($email, FILTER_VALIDATE_EMAIL)? true : false;
            if($is_valid){
                $dom = explode('@', $email);
                $domaine = $dom[1];
                $is_valid = checkdnsrr($domaine, 'MX')? true : false;
                header('Location: '.$redirection);
                if($is_valid){
                    $this -> email = $email;
                }
            }
            
        }
        /**
         * @return mixed
         */
        public function getPassword(){
            return $this -> password;
        }
        /**
         * @param mixed $password
         */
        public function setPassword($password, $redirection){
            $is_valid = strlen($password) >= 4? true : false;
            header('Location: '.$redirection);
            if($is_valid){
                $this -> password = sha1($password);
            }
        }
        /**
         * @return mixed
         */
        public function getNom(){
            return $this -> nom;
        }
        /**
         * @param mixed $nom
         */
        public function setNom($nom){
            $this -> nom = $nom;
        }
        /**
         * @return mixed
         */
        public function getPrenom(){
            return $this -> prenom;
        }
        /**
         * @param mixed $prenom
         */
        public function setPrenom($prenom){
            $this -> prenom = $prenom;
        }
        /**
         * @return mixed
         */
        public function getisAdmin(){
            return $this -> is_admin;
        }
        /**
         * @param mixed $is_admin
         */
        public function setIsAdmin($is_admin){
            $this -> is_admin = $is_admin;
        }
        /**
         * @return mixed
         */
        public function getCreatedAt($date_format = false){
            if($date_format){
                if(is_string($this->created_at)){
                    $this->created_at = new \DateTime($this->created_at);
                }
                $date_fr = $this -> created_at -> format('d/m/Y');
                return $date_fr;
            }
            return $this -> created_at;
        }
        /**
         * @param mixed $created_at
         */
        public function setCreatedAt($created_at){
            $this -> created_at = $created_at;
        }
        /**
         * @return mixed
         */
        public function getUpdatedAt($date_format = false){
            if($date_format) {
                if(is_string($this->updated_at)) {
                    $this->updated_at = new \DateTime($this->updated_at);
                }
                $date_fr = $this->updated_at->format('d-m-Y');
                return $date_fr;
            }
            return $this->updated_at;
        }
        /**
         * @param mixed $updated_at
         */
        public function setUpdatedAt($updated_at){
            $this -> updated_at = $updated_at;
        }
    }