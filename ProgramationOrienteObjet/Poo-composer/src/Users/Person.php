<?php
namespace POO\Users;
    class Person{
        private $prenom;
        public function __construct($prenom){
            $this->prenom = $prenom;
        }
        /**
         * @return mixed
         */
        public function getPrenom(){
            return $this -> prenom;
        }
        public function __toString(){
            // TODO: Implement __toString() method.
        return "prenom: {$this->prenom}";
        }
    }