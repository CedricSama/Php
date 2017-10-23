<?php
    namespace TODO\Repository;
    use TODO\Kernel\DB;
    class TaskRepository{
        // Cette class est dédiée exclusivement à lancer des requêtes SQL dans la DB et à communiquer avec la table task
        private $table_name = "task";
        private $pdo;
        // Le constructeur de cette class va prendre en charge la connexion à la DB
        public function __construct(){
            $db = new DB();
            $this -> pdo = $db -> getConnection();
        }
        public function findAllTasks(int $id_user){
            $sql = "SELECT * FROM {$this->table_name} INNER JOIN statut WHERE task.id_statut = statut.id_statut AND $id_user = :id_user";
            $stmt = $this -> pdo -> prepare($sql);
            $stmt -> bindValue(':id_user', $id_user, \PDO::PARAM_INT);
            $stmt -> execute();
            // Engendre des objets de type StdClass
//        $res->setFetchMode(\PDO::FETCH_OBJ);
            // on préfère "hydrater" avec une/des instances de type Task
            $stmt -> setFetchMode(\PDO::FETCH_CLASS, 'TODO\Entity\Task');
            //$res
            //var_dump($res->fetchAll());
            $res = $stmt -> fetchAll();
//        echo $res[0]['titre'];
//        echo $res[0]->titre;
            // echo $res[0]->getTitre();
            return $res;
        }
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
        public function findTaskById($id){
//        var_dump($id);
//        die();
            $sql = "SELECT * FROM {$this->table_name} WHERE 
{$this->table_name}.id_task = :id";
            $stmt = $this -> pdo -> prepare($sql);
            $stmt -> bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt -> execute();
            // Associer le résultat à l'entity TODO\Entity\Task
            $stmt -> setFetchMode(\PDO::FETCH_CLASS, 'TODO\Entity\Task');
            $res = $stmt -> fetch();
            //var_dump($res);
            //die();
            return $res;
        }
    }