<?php
namespace TODO\Kernel;


class EntityManager
{
    /**
     * Hydrater une entité
     * @param $datas $_POST | $_GET | $_SESSION ...
     * @param $entity chemin du namespace
     * @return $entity_hydrate, l'entité hydratée
     */
    public static function hydrate($datas,$entity) {
        //1 Instancier l'entité
        $entity_hydrate = new $entity();
        //2 Créer un tableau avec les données "nettoyées"
        $datas_clean = [];
        foreach($datas as $key=>$value) {
            if(is_array($value)) {
                foreach($value as $k=>$v) {
                    $datas_clean[$k] = htmlentities(trim($v));
                }
            } elseif(!empty($value)) {
                $datas_clean[$key] = htmlentities(trim($value));
            } else {
                $datas_clean[$key] = null;
            }
        }
        if(count($datas_clean)>0) {
            foreach($datas_clean as $ks=>$vs) {
                $setter = "set";
                $setter .=ucfirst($ks);
                $entity_hydrate->$setter($vs);
            }
        } else {
            throw new \Exception("impossible d'hydrater l'entité");
        }

        return $entity_hydrate;
    }

}