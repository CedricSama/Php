<?php
    namespace TODO\Repository;
    use TODO\Kernel\DB;
    use TODO\Entity\Task;
    /**
     * Class TaskRepository
     *Cette classe est dédié exclusivement à lancer des requetes SQL dans la DB et à communiquer avec la table task
     *
     * @package TODO\Repository
     */
    class TaskRepository{
        private $table_name = 'task';
        private $pdo;
        //Le constructeur de cette classe va prendre en charge la connexion à la DB
        public function __construct(){
            $db = new DB();
            $this -> pdo = $db -> getConnection();
        }
        public function findAllTask(){
            $sql = "SELECT * FROM ($this->table_name)";
            $result = $this -> pdo -> query($sql);
            //engendre des objet de type stdClass
//            $result->setFetchMode(\PDO::FETCH_OBJ);
            //On prefere "hydrater" avec une/des instences de type Task
            $result->setFetchMode(\PDO::FETCH_CLASS, 'TODO\Entity\Task');
            
            $result = $result -> fetchAll();
            echo $result[0]->getTitre();
        }
    }