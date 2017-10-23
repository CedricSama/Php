<?php

namespace TODO\Repository;
use TODO\Entity\User;
use TODO\Kernel\DB;

class UserRepository
{
    private $table_name = "user";
    private $pdo;
    // Le constructeur de cette class va prendre en charge la connexion à la DB
    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->getConnection();
    }

    public function createUser(User $user) {
        $sql = "INSERT INTO {$this->table_name} (login,password,email,prenom,nom,is_admin,created_at,updated_at) VALUES (:login,:password,:email,:prenom,:nom,:is_admin,:created_at,:updated_at)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':login',$user->getLogin(),\PDO::PARAM_STR);
        $stmt->bindValue(':password',$user->getPassword(),\PDO::PARAM_STR);
        $stmt->bindValue(':email',$user->getEmail(),\PDO::PARAM_STR);
        $stmt->bindValue(':prenom',$user->getPrenom(),\PDO::PARAM_STR);
        $stmt->bindValue(':nom',$user->getNom(),\PDO::PARAM_STR);
        $stmt->bindValue(':is_admin',$user->getisAdmin(),\PDO::PARAM_BOOL);
        $stmt->bindValue(':created_at',$user->getCreatedAt(true),\PDO::PARAM_STR);
        $stmt->bindValue(':updated_at',$user->getUpdatedAt(true),\PDO::PARAM_STR);
        $res = $stmt->execute();

        return $res;
    }

    public function findOneUserBy($critere,$value) {
        $sql = "SELECT * FROM {$this->table_name} WHERE $critere = :critere";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':critere',$value,\PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'TODO\Entity\User');
        $res = $stmt->fetchAll();
        return $res;
    }

    public function login(User $user) {
        $sql = "SELECT * FROM {$this->table_name} WHERE login = :login AND password = :password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':login',$user->getLogin(),\PDO::PARAM_STR);
        $stmt->bindValue(':password',$user->getPassword(),\PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'TODO\Entity\User');
        $res = $stmt->fetchAll();
        return $res;
    }

}