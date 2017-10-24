<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 12/06/2017
 * Time: 16:58
 */

namespace TODO\Repository;


class StatutRepository
{

    private $table_name = "statut";
    public $pdo;

    public function __construct()
    {
        // Récupérer la connexion à la DB
        $db = new DB();
        $this->pdo = $db->getConnection();
    }
    public function findAllStatut(){
        $sql = "SELECT * FROM {$this->table_name}";
        $res = $this->pdo->query($sql);
        $res= $res->fetchAll(\PDO::FETCH_CLASS,'TODO\Entity\Statut');
        return $res;

    }
}