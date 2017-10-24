<?php
namespace TODO\Controller;

use TODO\Entity\User;
use TODO\Kernel\EntityManager;
use TODO\Repository\UserRepository;
use TODO\Services\FormFactory;
use TODO\Services\ToolBox;
use TODO\Services\Validator;

class ControllerUser
{

    private $root_path_views;
    private $user_repository;

    public function __construct()
    {
        $this->root_path_views = dirname(dirname(__FILE__)).'/Views/User/';
        $this->user_repository = new UserRepository();
        session_start();
    }

// Afffiche le formulaire pour s'identifier
    public function login() {
       // Utiliser le service FormFactory
        $form = new FormFactory($_POST);
        require_once $this->root_path_views.'login.php';
    }

// Traitement du formulaire de login une fois validé
    public function doLogin() {
        // On récupère les données du formulaire,
        // cela nous permet d'instancier un objet de type Entity\User
//        $user = new User();
//        $user->setLogin($_POST['login']);
//        $user->setPassword($_POST['password']);
        $user= EntityManager::hydrate($_POST,'\TODO\Entity\User');
//        var_dump($user);
//        die();
        $validators = ['empty'=>$_POST];
        $validator = new Validator($validators);
       // var_dump($validator->getMessages());
        //die();
        if($validator->getMessages()) {
            ToolBox::setFlash($validator->getMessages(),'danger');
            header('Location: index.php?action=User/login');
        } else {
            // Instanciation du UserRepository
            $res = $this->user_repository->reqLogin($user);
            //  echo $res->getLogin();
            if(count($res) ==1) {
                $_SESSION['id_user'] = $res[0]->getIdUser();
                $_SESSION['is_logged'] = true;
                header('Location: index.php?action=Task/showAll');
            } else {
                ToolBox::setFlash('Impossible de vous identifier','danger');
                header('Location: index.php?action=User/login');
            }
        }

    }

    // Afficher le formulaire de création de compte
    public function register() {
        //echo "salut la méthode register";
        $form = new FormFactory($_POST);
        require_once $this->root_path_views.'register.php';
    }

    // Valider le formulaire de création de compte
    public function doRegister() {
        // Hydrater l'instance
        $user = EntityManager::hydrate($_POST,'TODO\Entity\User');
       // Préparer un tableau associatif avec les données à valider
        $validators = ['email'=>$user->getEmail(),
                       'password'=>$_POST['password'],
                       'empty'=>$_POST];
        // On instancie la class Validator
        $validator = new Validator($validators);
        //var_dump($validator->getMessages());
        //die();
    if($validator->getMessages()) {
        ToolBox::setFlash($validator->getMessages(),'danger');
        header('Location: index.php?action=User/register');
    } else {
        // Chercher si on a déjà un user avec ce mail
        $count_email_user = $this->user_repository->findUserBy('email',$user->getEmail());
        // Chercher si on a déjà un user avec ce login
        $count_login_user = $this->user_repository->findUserBy('login',$user->getLogin());
        $crea_compte =true;
        $messages = [];
        if(count($count_email_user) == 1) {
            $messages[] = "un compte est déjà créé avec cet email";
            $crea_compte = false;
        }
        if(count($count_login_user) == 1) {
            $messages[] = "un compte est déjà créé avec ce login";
            $crea_compte = false;
        }
        if($crea_compte) {
            // Insertion du user dans la table
            $res = $this->user_repository->reqRegister($user);
            //Recuperation de l'id du user qui vient d'etre inseré dans la table

            if($res) {
                $lastId= $this->user_repository->getLastInsertId();

                $_SESSION['id_user'] = $lastId;
                $_SESSION['is_logged'] = true;
                header('Location: index.php?action=Task/showAll');
            } else {
                ToolBox::setFlash("impossible de vous créer un compte",'danger');
                header('Location: index.php?action=User/register');
            }
        } else {
            ToolBox::setFlash($messages,'danger');
            header('Location: index.php?action=User/register');
        }
        }
    }
}