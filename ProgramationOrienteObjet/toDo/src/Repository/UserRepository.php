<?php
namespace TODO\Repository;
use TODO\Entity\User;
use TODO\Kernel\DB;

class UserRepository
{

    private $table_name = "user";
    public $pdo;

    public function __construct()
    {
        // Récupérer la connexion à la DB
        $db = new DB();
        $this->pdo = $db->getConnection();
    }
    /**
     * @return mixed
     */
public function getLastInsertId()
{
    return $this->pdo->lastInsertId();
}
    /**
     * Identifier un utilisateur
     * @param User $user
     * @return array User $users
     */
    public function reqLogin(User $user) {
        $login = $user->getLogin();
        $password = $user->getPassword();
        // Requête préparée
        $sql = "SELECT * FROM {$this->table_name} WHERE login= :login AND password= :password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":login",$login,\PDO::PARAM_STR);
        $stmt->bindParam(':password',$password,\PDO::PARAM_STR);
        // exécution de la requête préparée
        $stmt->execute();
        // Récupération du résultat de la requête
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'TODO\Entity\User');
//        $stmt->setFetchMode(\PDO::FETCH_OBJ);
        $res = $stmt->fetchAll();
        return $res;
    }

    public function reqRegister(User $user) {
        $sql = "INSERT INTO {$this->table_name} (login,password,email,prenom,nom,is_admin,created_at) VALUES(:login,:password,:email,:prenom,:nom,:is_admin,:created_at)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":login",$user->getLogin(),\PDO::PARAM_STR);
        $stmt->bindValue(':password',$user->getPassword(),\PDO::PARAM_STR);
        $stmt->bindValue(':email',$user->getEmail(),\PDO::PARAM_STR);
        $stmt->bindValue(':prenom',$user->getPrenom(),\PDO::PARAM_STR);
        $stmt->bindValue(':nom',$user->getNom(),\PDO::PARAM_STR);
        $stmt->bindValue(':is_admin',$user->getisAdmin(),\PDO::PARAM_BOOL);
        $stmt->bindValue(':created_at',$user->getCreatedAt(true),\PDO::PARAM_STR);
        $res = $stmt->execute();
        return $res;
    }

    public function findUserBy($critere,$value) {
        $sql = "SELECT * FROM {$this->table_name} WHERE $critere =:critere";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':critere',$value,\PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'TODO\Entity\User');
        $res = $stmt->fetchAll();
        return $res;
    }

}