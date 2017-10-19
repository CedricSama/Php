<?php
    namespace TODO\Model\Repository;
    use TODO\Kernel\DB;
    use TODO\Model\Entity;
    class UserRepository{
        private $table_name = 'user';
        private $pdo;
        public function __construct(){
            $db = new DB();
            $this -> pdo = $db -> getConnection();
            $users = new Entity\User();
            var_dump($users);
        }
        public function findAllTask(){
            $sql = "SELECT * FROM ($this->table_name)";
            $result = $this -> pdo -> query($sql);
            $result->setFetchMode(\PDO::FETCH_OBJ);
            $result = $result -> fetchAll();
            return $result;
        }
    }