<?php
    namespace TODO\Controller;
    use TODO\Services\Flash;
    use TODO\Services\Validator;
    use TODO\Model\Entity\User;
    use TODO\Model\Repository\UserRepository;
    class ControllerUser{
        private $root_path_views;
        /**
         * ControllerUser constructor.
         */
        public function __construct(){
            $this -> root_path_views =
                dirname(dirname(dirname(__FILE__))).'/views/user/';
        }
        /**
         * redirection sur la page de creation
         */
        public function create(){
            require_once($this -> root_path_views.'create.php');
        }
        /**
         * Inject Nouvel utilisateur dans la table (nouvelle ligne)
         */
        public function store(){
            $redirection = header('Location: ?action=user/create');
            $now = new \DateTime();
            $user = new User();
            $datetime_sql = $now -> format('Y-m-d\TH:i:s.u');
            $user -> setLogin($_POST['login']);
            $user -> setEmail($_POST['email'], $redirection);
            $user -> setPassword(sha1($_POST['password'], $redirection));
            $user -> setNom($_POST['name']);
            $user -> setPrenom($_POST['firstname']);
            $user -> setIsAdmin(0);
            $user -> setCreatedAt($datetime_sql);
            $user -> setUpdatedAt($datetime_sql);
            $user_repository = new UserRepository();
            $user_repository -> createUser($user);
            $redirection;
        }
        /**
         * Test les infos avant de l'envoyé dans le store
         */
        public function validator(){
            $messages = [];
            $validateur = new Validator();
            $flash = new Flash();
            $data = $validateur ->testDataForm($_POST, ['login', 'email','password', 'name', 'firstname']);
            if(in_array(null, $data)){
                $messages[] = "Tous les champs sont obligatoires.";
                $flash -> setFlash($messages, 'error');
                header('Location: ?action=user/create');
            }elseif(($this -> login_test(($_POST['login'])) == true)){
                $messages[] = "Ce loggin est déja utilisé.";
                $flash -> setFlash($messages, 'error');
                header('Location: ?action=user/create');
            }elseif(($this -> email_test(($_POST['email'])) == true)){
                $messages[] = "Vous avez déjà un compte.";
                $flash -> setFlash($messages, 'error');
                header('Location: ?action=user/create');
            }else{
                $this -> store();
                $messages[] = "Votre compte à bien été crée.";
                $flash -> setFlash($messages, 'succes');
                header('Location: ?action=user/create');
            }
                
            }
            // public function validator(){
        //     if(isset($_POST)){
        //         if(in_array(null, $_POST)){
        //             header('Location: ?action=user/create');
        //         }else{
        //             if(($this -> email_test(($_POST['email'])) == true)){
        //                 header('Location: ?action=user/create');
        //             }elseif(($this -> login_test(($_POST['login'])) == true)){
        //                 header('Location: ?action=user/create');
        //             }elseif(($this -> login_test(($_POST['login'])) == true) && ($this -> email_test(($_POST['email'])) == true)){
        //                 header('Location: ?action=user/create');
        //             }else{
        //                 $this -> store();
        //             }
        //         }
        //     }else{
        //         header('Location: ?action=user/create');
        //     }
        // }
        private function email_test($email){
            $users = new UserRepository();
            $users -> findUserByEmail($email);
            //stock dans un result et je count les resultats
        }
        private function login_test($login){
            $users = new UserRepository();
            $users -> findUserByLogin($login);
        }
    }