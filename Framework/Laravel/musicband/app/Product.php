<?php
    namespace App;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Http\Request;
    class Product extends Model{
        
        private $code_pays;
        const TVA_FR = 20;
        const TVA_DE = 21;
        const TVA_UK = 20;
        
        protected $guarded = ['id'];
    
        public function __construct(array $attributes = []){
            parent ::__construct($attributes);
            $this -> setCodePays('fr');
        }
        
        /**
         * @param $code_pays
         * @throws \Exception
         */
        public function setCodePays($code_pays){
            $code_pays_ok = ['FR', 'DE', 'UK'];
            if(!(in_array(strtoupper($code_pays), $code_pays_ok))){
                throw new \Exception('Les codes pays autorisés sont '.implode(',', $code_pays_ok));
            }
            $this->code_pays= strtoupper($code_pays);
        }
        /**
         * @return mixed
         */
        public function getCodePays(){
            return $this -> code_pays;
        }
        /**
         * @return float|mixed
         * @throws \Exception
         */
        private function displayPrice($prix_ht){
            if(empty($this->code_pays)){
                throw new \Exception('Merci de renseigner un code pays avant de lancer un calcul de prix TTC.');
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
            $prix_ttc = round($prix_ht * (1 + ($tva / 100)));
            return $prix_ttc;
        }
    
    }
