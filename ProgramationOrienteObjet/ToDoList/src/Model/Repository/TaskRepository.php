<?php
    namespace TODO\Model\Repository;
    use TODO\Kernel\DB;
    /**
     * Class TaskRepository
     *Cette classe est dédié exclusivement à lancer des requetes SQL dans la DB et à communiquer avec la table task
     *
     * @package TODO\Repository
     */
    class TaskRepository{
        private $table_name = 'task';
        //PDO securise les données avant contact avec la DB
        private $pdo;
        //Le constructeur de cette classe va prendre
        //en charge la connexion à la DB
        public function __construct(){
            $db = new DB();
            $this -> pdo = $db -> getConnection();
        }
        public function findAllTask(){
            //$sql = "SELECT * FROM {$this->table_name} INNER JOIN statut WHERE task.id_statut = statut.id_statut";
            $sql = "SELECT * FROM {$this->table_name} INNER JOIN statut WHERE {$this->table_name}.id_statut = statut.id_statut";
            $result = $this -> pdo -> query($sql);
            //engendre des objet de type stdClass
            //$result->setFetchMode(\PDO::FETCH_OBJ);
            //On prefere "hydrater" avec une/des instences de type Task
            $result -> setFetchMode(\PDO::FETCH_CLASS, 'TODO\Model\Entity\Task');
            $result = $result -> fetchAll();
            //  echo $result[0]->getTitre();
            return $result;
        }
        /**
         * @param $task
         * @return bool
         */
        public function create($task){
            $sql = "INSERT INTO {$this->table_name} (titre,resume,content,created_at,updated_at,id_statut,id_user) VALUES (:titre,:resume,:content,:created_at,:updated_at,:id_statut,:id_user)";
            $stmt = $this -> pdo -> prepare($sql);
            $stmt -> bindValue(':titre', $task -> getTitre(), \PDO::PARAM_STR);
            $stmt -> bindValue(':resume', $task -> getResume(), \PDO::PARAM_STR);
            $stmt -> bindValue(':content', $task -> getContent(), \PDO::PARAM_STR);
            $stmt -> bindValue(':created_at', $task -> getCreatedAt(), \PDO::PARAM_STR);
            $stmt -> bindValue(':updated_at', $task -> getUpdatedAt(), \PDO::PARAM_STR);
            $stmt -> bindValue(':id_statut', $task -> getIdStatut(), \PDO::PARAM_INT);
            $stmt -> bindValue(':id_user', $task -> getIdUser(), \PDO::PARAM_INT);
            $res = $stmt -> execute();
            return $res;
        }
        /**
         * @param $id
         * @return mixed
         */
        public function findTaskById($id){
            $sql = "SELECT * FROM {$this->table_name} WHERE {$this->table_name}.id_task = :id_task";
            //$stmt ---> "statement" (état de la connexion)
            $stmt = $this -> pdo -> prepare($sql);
            $stmt -> bindValue(':id_task', $id, \PDO::PARAM_INT);
            //execute la requete;
            $stmt -> execute();
            //assoscié le reulstat à l'entity "Entity\Task".
            $stmt -> setFetchMode(\PDO::FETCH_CLASS, 'TODO\Model\Entity\Task');
            $result = $stmt -> fetch();
            //var_dump($result);die();
            return $result;
        }
    }