<?php
    
    class Product{
        private $nom;
        private $prix_ttc;
        private $prix_ht;
        private $is_online;
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
        public function getPrixTtc(){
            return $this -> prix_ttc;
        }
        /**
         * @param mixed $prix_ttc
         */
        public function setPrixTtc($prix_ttc){
            $this -> prix_ttc = $prix_ttc;
        }
        /**
         * @return mixed
         */
        public function getPrixHt(){
            return $this -> prix_ht;
        }
        /**
         * @param mixed $prix_ht
         */
        public function setPrixHt($prix_ht){
            $this -> prix_ht = $prix_ht;
        }
        /**
         * @return mixed
         */
        public function getisOnline(){
            return $this -> is_online;
        }
        /**
         * @param mixed $is_online
         */
        public function setIsOnline($is_online){
            $this -> is_online = $is_online;
        }
    }