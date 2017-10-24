<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 12/06/2017
 * Time: 16:58
 */

namespace TODO\Repository;


use TODO\Kernel\DB;

class TaskRepository
{
private $table_name = "task";

    public $pdo;

    public function __construct()
    {
        // Récupérer la connexion à la DB
        $db = new DB();
        $this->pdo = $db->getConnection();
    }
    public function findAllTask(){
        $sql = "SELECT * FROM {$this->table_name} LEFT JOIN statut AS S ON S.id_statut= {$this->table_name}.id_statut";
        $res = $this->pdo->query($sql);
        $res= $res->fetchAll(\PDO::FETCH_CLASS,'TODO\Entity\Task');
       return $res;
    }
}