<?php
    namespace TODO\Model\Repository;
    use TODO\Kernel\DB;
    //use TODO\Model\Entity\User;
    class UserRepository{
        private $table_name = 'user';
        private $pdo;
        public function __construct(){
            $db = new DB();
            $this -> pdo = $db -> getConnection();
            //$users = new User();
            //var_dump($users);
        }
        // public function findAllUser(){
        //      $sql = "SELECT * FROM ($this->table_name)";
        //      $result = $this -> pdo -> query($sql);
        //      $result->setFetchMode(\PDO::FETCH_OBJ);
        //      $result = $result -> fetchAll();
        //      return $result;
        //  }
        public function createUser($user){
            $sql = "INSERT INTO {$this->table_name} (login,email,password,nom,prenom,is_admin,created_at,updated_at) VALUES (:login,:email,:password,:nom,:prenom,:is_admin,:created_at,:updated_at)";
            $stmt = $this -> pdo -> prepare($sql);
            $stmt -> bindValue(':login', $user -> getLogin(), \PDO::PARAM_STR);
            $stmt -> bindValue(':email', $user -> getEmail(), \PDO::PARAM_STR);
            $stmt -> bindValue(':password', $user -> getPassword(), \PDO::PARAM_STR);
            $stmt -> bindValue(':nom', $user -> getNom(), \PDO::PARAM_STR);
            $stmt -> bindValue(':prenom', $user -> getPrenom(), \PDO::PARAM_STR);
            $stmt -> bindValue(':is_admin', $user -> getIsAdmin(), \PDO::PARAM_STR);
            $stmt -> bindValue(':created_at', $user -> getCreatedAt(), \PDO::PARAM_STR);
            $stmt -> bindValue(':updated_at', $user -> getUpdatedAt(), \PDO::PARAM_STR);
            $res = $stmt -> execute();
            return $res;
        }
        public function findUserByEmail($user){
            $sql = "SELECT * FROM {$this->table_name} WHERE {$this->table_name}.email = :user";
            $stmt = $this -> pdo -> prepare($sql);
            $stmt -> bindValue(':user', $user, \PDO::PARAM_STR);
            $stmt -> setFetchMode(\PDO::FETCH_CLASS, 'TODO\Model\Entity\User');
            $res = $stmt -> fetchAll();
            return $res;
        }
        public function findUserByLogin($user){
            $sql = "SELECT * FROM {$this->table_name} WHERE {$this->table_name}.login = :user";
            $stmt = $this -> pdo -> prepare($sql);
            $stmt -> bindValue(':user', $user, \PDO::PARAM_STR);
            $stmt -> setFetchMode(\PDO::FETCH_CLASS, 'TODO\Model\Entity\User');
            $res = $stmt -> fetchAll();
            return $res;
        }
    }