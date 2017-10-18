<?php
    namespace POO\Users;
    use POO\Users\Person as Member;
    class Equipe{
        //Création d'un tableau vide de membre de l'equipe
        private $members = [];
        /**
         * @param Person $member
         * @return array
         * @internal param Person $person
         */
        public function add(Member $member){
            $this -> members[] = $member;
            return $this -> members;
        }
        /**
         * @return array
         */
        public function getMembers():array {
            return $this -> members;
        }
    }