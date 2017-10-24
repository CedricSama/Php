<?php
namespace TODO\Services;

class ToolBox
{
    /**
     * Extraire les données d'un formulaire
     * @param array $datas_brut $_POST ou $_GET >
     * @return array $datas
     */
    public static function extract_datas_form($datas_brut) {
        $datas = [];
        foreach($datas_brut as $key => $data_brut) {
            // Verifier si champ non vide
            if(empty($data_brut) == false) {
                // On insère dans le nouveau array $datas la valeur "nettoyée". trim enlève les éventuels espaces saisis par erreur par le user
                $datas[$key] = trim($data_brut);
            } else {
                // Si une donnée est vide
                $datas[$key] = null;
            }
        }
        return $datas;
    }




    /**
     * Stocker un message "Flash" dans la session
     * @param $message
     * @param $type (danger,success,warning,info)
     */
    public static function setFlash($message,$type) {
        if(isset($_SESSION) == false) {
            session_start();
        }
        $_SESSION['flash'] = array('type'=>$type,'message'=>$message);
    }

    public static function getFlash() {
//    if(isset($_SESSION) == false) {
//        session_start();
//    }
        // Si on a un message, on l'affiche
        if(isset($_SESSION['flash'])) {
            $type = $_SESSION['flash']['type'];
            $message = $_SESSION['flash']['message'];
            $html = "<div class='alert alert-$type'>";
            if(is_array($message)) {
                foreach($message as $m) {
                    $html .= $m.'<br/>';
                }
            } else {
                $html .= $message;
            }
            $html .= "</div>";
            // Affichage du message
            echo $html;
            // Destruction du message
            unset($_SESSION['flash']);
        }
    }
}