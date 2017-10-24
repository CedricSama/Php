<?php


namespace TODO\Entity;


class Statut
{
private $id_statut;
private $id_libelle;

    /**
     * @return mixed
     */
    public function getIdStatut()
    {
        return $this->id_statut;
    }

    /**
     * @param mixed $id_statut
     */
    public function setIdStatut($id_statut)
    {
        $this->id_statut = $id_statut;
    }

    /**
     * @return mixed
     */
    public function getIdLibelle()
    {
        return $this->id_libelle;
    }

    /**
     * @param mixed $id_libelle
     */
    public function setIdLibelle($id_libelle)
    {
        $this->id_libelle = $id_libelle;
    }






}
