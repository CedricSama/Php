<?php
    namespace TODO\Kernel;
    class DB{
        private $pdo;
        public static $db_name;
        public static $db_login;
        public static $db_password;
        public static $db_host;
        /**
         * DB constructor.
         */
        public function __construct(){
            //connexion a la DB via la class PDO fournie par PHP
            $dsn = 'mysql:host='.static::$db_host.';dbname='.self::$db_name;
            $options = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
            $this -> pdo = new \PDO($dsn, self::$db_login, static::$db_password, $options);
            $this -> pdo -> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        /**
         * Récupere la connexion en cours a la Base de Données
         * @return \PDO
         */
        public function getConnection(){
            return $this -> pdo;
        }
    }