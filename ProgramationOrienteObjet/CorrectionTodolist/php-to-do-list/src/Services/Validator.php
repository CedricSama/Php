<?php
    /**
     * Created by PhpStorm.
     * User: stagiaire
     * Date: 20/10/2017
     * Time: 16:27
     */
    namespace TODO\Services;
    class Validator{
        public static $password_lenght;
        public function setFlash($messages, $type = "danger"){
            // Tester si la session du user existe ou non
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['flash'] = ['messages' => $messages, 'type' => $type];
        }
        public function getFlash(){
            // Tester si la session du user existe ou non
            if(!isset($_SESSION)){
                session_start();
            }
            if(isset($_SESSION['flash'])){
                $html = '<div class="alert alert-'.$_SESSION['flash']['type'].'">';
                foreach($_SESSION['flash']['messages'] as $message){
                    $html .= "<p>$message</p>";
                }
                $html .= '</div>';
                // Supprimer le message de la session
                unset($_SESSION['flash']);
                return $html;
            }
            return false;
        }
        /**
         * Vérifier que le mot de passe a au moins 9 caractères
         *
         * @param $password
         * @return bool
         */
        public function checkPassword($password){
            $is_valid = strlen($password) >= 9? true:false;
            return $is_valid;
        }
        public function checkEmail($email){
            // titi@gmail.com
            // Tester le format de l'adresse email
            $is_valid = filter_var($email, FILTER_VALIDATE_EMAIL)? true:false;
            // Tester si le domaine de l'email a bien un service DNS MX déclaré
            if($is_valid){
                $dom = explode('@', $email);
                $domaine = $dom[1];
                $is_valid = checkdnsrr($domaine, 'MX')? true:false;
            }
            return $is_valid;
        }
        public function isEmpty(array $datas){
            if(in_array(null, $datas)){
                return null;
            }
            return $datas;
        }
    }