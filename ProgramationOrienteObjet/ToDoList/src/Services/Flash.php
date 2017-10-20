<?php
    namespace TODO\Services;
    class Flash{
        function setFlash($messages, $type = 'danger'){
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['flash'] = ['messages' => $messages, 'type' => $type];
        }
        function getFlash(){
            if(!isset($_SESSION)){
                session_start();
            }
            if(isset($_SESSION['flash'])){
                $html = '<div class="alert alert-'.$_SESSION['flash']['type'].'" role="alert">';
                foreach($_SESSION['flash']['messages'] as $message){
                    $html .= '<p>'.$message.'</p>';
                }
                $html .= '</div>';
                unset($_SESSION['flash']);
                return $html;
            }
            return false;
        }
    }