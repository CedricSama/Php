<?php
    namespace TODO\Entity;
    class Statut{
        private $id_statut;
        private $libelle;
        /**
         * @return mixed
         */
        public function getIdStatut(){
            return $this -> id_statut;
        }
        /**
         * @param mixed $id_statut
         */
        public function setIdStatut($id_statut){
            $this -> id_statut = $id_statut;
        }
        /**
         * @return mixed
         */
        public function getLibelle(){
            return $this -> libelle;
        }
        /**
         * @param mixed $libelle
         */
        public function setLibelle($libelle){
            $this -> libelle = $libelle;
        }
        
    }