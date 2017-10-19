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
        private $creat_at;
        private $update_at;
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
        public function setEmail($email){
            $this -> email = $email;
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
        public function setPassword($password){
            $this -> password = $password;
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
        public function getCreatAt(){
            return $this -> creat_at;
        }
        /**
         * @param mixed $creat_at
         */
        public function setCreatAt($creat_at){
            $this -> creat_at = $creat_at;
        }
        /**
         * @return mixed
         */
        public function getUpdateAt(){
            return $this -> update_at;
        }
        /**
         * @param mixed $update_at
         */
        public function setUpdateAt($update_at){
            $this -> update_at = $update_at;
        }
        
        
    }