<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 23/10/2017
 * Time: 09:21
 */

namespace TODO\Controller;

use TODO\Entity\User;
use TODO\Repository\UserRepository;
use TODO\Services\Validator;

class ControllerUser
{
    private $root_path_views;
    private $user_repository;
    private $validator;
    private $messages;

    public function __construct()
    {
        $this->root_path_views =
            dirname(dirname(dirname(__FILE__))).'/views/user/';
        $this->user_repository = new UserRepository();
        $this->validator = new Validator();
        $this->messages = $this->validator->getFlash();
    }

    // Afficher le formulaire de création de compte
    public function create() {
        $messages = $this->messages;
        require_once $this->root_path_views.'create.php';
    }

    // Action POST du formulaire de création de compte
    public function store() {
     $record = true;
     $messages = [];
        // Vérifier que les champs sont tous renseignés
        $is_empty = $this->validator->isEmpty($_POST);
        if($is_empty) {
            $record = false;
            $messages[]='Tous les champs sont obligatoires';
            $this->validator->setFlash($messages);
        }
        // Vérifier le format du mail
        if($this->validator->checkEmail($_POST['email']) == false) {
            $record = false;
            $messages[]='Votre email est invalide';
            $this->validator->setFlash($messages);
        }
        // Vérifier le format du password
        if($this->validator->checkPassword($_POST['password']) == false) {
            $record = false;
            $password_length = Validator::$password_length;
            $messages[]="Votre mot de passe est invalide. $password_length  caractères obligatoire";
            $this->validator->setFlash($messages);
        }
        $user_login = $this->user_repository->findOneUserBy('login',$_POST['login']);
        if(count($user_login) == 1) {
            $record = false;
            $messages[]="Ce login est déjà utilisé";
            $this->validator->setFlash($messages);
        }
        $user_email = $this->user_repository->findOneUserBy('email',$_POST['email']);
        if(count($user_email) == 1) {
            $record = false;
            $messages[]="Cet email est déjà utilisé";
            $this->validator->setFlash($messages);
        }
     if($record) {
         // Création en mémoire "vive" de l'instance user avec hydratation des données en provenance du formulaire
         $user = new User;
         $user->setLogin($_POST['login']);
         $user->setPassword($_POST['password']);
         $user->setEmail($_POST['email']);
         $user->setPrenom($_POST['prenom']);
         $user->setNom($_POST['nom']);
         // Création en DB du user instancié
         $res = $this->user_repository->createUser($user);
         if($res) {
             // On log automatiquement l'utilisateur
             session_start();
             $_SESSION['is_logged'] = true;
             $_SESSION['is_admin'] = $user->getIsAdmin();
             $_SESSION['id'] = $user->getIdUser();
             $_SESSION['prenom'] = $user->getPrenom();
             header('Location: index.php?action=task/index');
             exit();
         }
     }
     else {
            header('Location: index.php?action=user/create');
     }
    }

    // Afficher le formulaire pour identifier un user
    public function login() {
        $messages = $this->messages;
        require_once $this->root_path_views."login.php";
    }

    public function executeLogin() {
        $login = true;
        $messages = [];
        // Vérifier que les champs sont tous renseignés
        $is_empty = $this->validator->isEmpty($_POST);
        if($is_empty) {
            $login = false;
            $messages[]='Tous les champs sont obligatoires';
            $this->validator->setFlash($messages);
        }
        if($login) {
            $user = new User;
            $user->setLogin($_POST['login']);
            $user->setPassword($_POST['password']);
            $user_sql = $this->user_repository->login($user);
            if(count($user_sql) == 1) {
                // Démarrer une session
                session_start();
                $_SESSION['is_logged'] = true;
                $_SESSION['is_admin'] = $user_sql[0]->getIsAdmin();
                $_SESSION['id'] = $user_sql[0]->getIdUser();
                $_SESSION['prenom'] = $user_sql[0]->getPrenom();
                header('Location: index.php?action=task/index');
            } else {
                $messages[]='Impossible de vous identifier';
                $this->validator->setFlash($messages);
                header('Location: index.php?action=user/login');
            }
        } else {
            // Sinon redirection sur le formulaire pour s'identifier
            header('Location: index.php?action=user/login');
        }
    }

    public function logout() {
        session_start();
        session_destroy();

        header('Location: index.php?action=user/login');
    }

}