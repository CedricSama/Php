<?php
    namespace POO;
    use POO\Users\Equipe;
    use POO\Users\Person as Recrue;
    class Societe{
        private $equipe;
        //Injectiond de dépendence$
        //instence de Type société ne peut exister sans instence de type equipe;
        public function __construct(Equipe $equipe){ $this -> equipe = $equipe; }
        public function embaucher(Recrue $recrue){ $this -> equipe -> add($recrue); }
    }