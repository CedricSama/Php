<?php
    namespace TODO\Entity;
    class User{
        private $id_user;
        private $login;
        private $password;
        private $email;
        private $prenom;
        private $nom;
        private $is_admin;
        private $created_at;
        private $updated_at;
        public function __construct(){
            $this -> setIsAdmin(0);
            $this -> setCreatedAt(new \DateTime());
            $this -> setUpdatedAt(new \DateTime());
        }
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
        public function setLogin(string $login){
            $this -> login = $login;
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
        public function setPassword(string $password){
            $this -> password = $password;
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
        public function setEmail(string $email){
            $this -> email = $email;
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
        public function setPrenom(string $prenom){
            $this -> prenom = sha1($prenom);
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
        public function setNom(string $nom){
            $this -> nom = $nom;
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
        public function setIsAdmin(bool $is_admin){
            $this -> is_admin = $is_admin;
        }
        /**
         * @return mixed
         */
        public function getCreatedAt($str = false){
            if($str){
                return $this -> created_at -> format('Y-m-d\TH:i:s.u');
            }
            return $this -> created_at;
        }
        /**
         * @param mixed $created_at
         */
        public function setCreatedAt(\DateTime $created_at){
            $this -> created_at = $created_at;
        }
        /**
         * @return mixed
         */
        public function getUpdatedAt($str = false){
            if($str){
                return $this -> created_at -> format('Y-m-d\TH:i:s.u');
            }
            return $this -> updated_at;
        }
        /**
         * @param mixed $updated_at
         */
        public function setUpdatedAt(\DateTime $updated_at){
            $this -> updated_at = $updated_at;
        }
    }