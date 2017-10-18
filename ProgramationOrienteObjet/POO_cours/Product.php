<?php
    
    class Product{
        private $nom;
        private $prix_ttc;
        private $prix_ht;
        private $is_online;
        private $code_pays;
        const TVA_FR = 20;
        const TVA_DE = 21;
        const TVA_UK = 20;
        public function __construct(){
            //mettre les valeurs par defaut;
            $this -> is_online = false;
            $this -> setCodePays('fr');
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
        public function getPrixTtc(){
            return $this -> prix_ttc;
        }
        /**
         * @throws Exception
         */
        public function setPrixTtc(){
            throw new Exception('Vous devez renseigner un prix HT ');
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
        public function setPrixHt(float $prix_ht){
            $this -> prix_ht = $prix_ht;
            $this -> calculTtcPrice();
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
        /**
         * @return mixed
         */
        public function getCodePays(){
            return $this -> code_pays;
        }
        /**
         * @param $code_pays
         * @throws Exception
         */
        public function setCodePays($code_pays){
            $code_pays_ok = ['FR', 'DE', 'UK'];
            if(!(in_array(strtoupper($code_pays), $code_pays_ok))){
                throw new Exception('Les codes pays autorisés sont '.implode(',', $code_pays_ok));
            }
            $this -> code_pays = strtoupper($code_pays);
        }
        /**
         * @return float
         * @throws Exception
         */
        private function calculTtcPrice(){
            if(empty($this -> code_pays)){
                throw new Exception('Merci de renseigner un code pays avant de lancer un calcul de prix TTC.');
            }
            $tva = null;
            switch($this -> code_pays){
                case "FR":
                    $tva = self::TVA_FR;
                    break;
                case "DE":
                    $tva = self::TVA_DE;
                    break;
                case "UK":
                    $tva = self::TVA_UK;
                    break;
            }
            $this -> prix_ttc = round($this -> prix_ht * (1 + ($tva / 100)));
            return $this -> prix_ttc;
        }
    }