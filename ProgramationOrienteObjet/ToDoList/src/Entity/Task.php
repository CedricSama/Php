<?php
   namespace TODO\Entity;
    class Task{
        private $id_task;
        private $titre;
        private $resume;
        private $content;
        private $creat_at;
        private $update_at;
        private $id_staut;
        private $id_user;
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
        /**
         * @return mixed
         */
        public function getIdStaut(){
            return $this -> id_staut;
        }
        /**
         * @param mixed $id_staut
         */
        public function setIdStaut($id_staut){
            $this -> id_staut = $id_staut;
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
        
    }