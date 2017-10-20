<?php
   namespace TODO\Model\Entity;
    class Task{
        private $id_task;
        private $titre;
        private $resume;
        private $content;
        private $created_at;
        private $updated_at;
        private $id_statut;
        private $id_user;
        private $libelle;
        /**
         * @return mixed
         */
        public function getIdTask(){
            return $this -> id_task;
        }
        /**
         * @param mixed $id_task
         */
        public function setIdTask($id_task){
            $this -> id_task = $id_task;
        }
        /**
         * @return mixed
         */
        public function getTitre(){
            return $this -> titre;
        }
        /**
         * @param mixed $titre
         */
        public function setTitre($titre){
            $this -> titre = $titre;
        }
        /**
         * @return mixed
         */
        public function getResume(){
            return $this -> resume;
        }
        /**
         * @param mixed $resume
         */
        public function setResume($resume){
            $this -> resume = $resume;
        }
        /**
         * @return mixed
         */
        public function getContent(){
            return $this -> content;
        }
        /**
         * @param mixed $content
         */
        public function setContent($content){
            $this -> content = $content;
        }
        /**
         * @param bool $date_format
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