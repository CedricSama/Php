<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 12/06/2017
 * Time: 16:57
 */

namespace TODO\Entity;


class Task
{
    private $id_task;
    private $titre;
    private $content;
    private $resume;
    private $createad_at;
    private $id_statut;
    private $id_user;

    /**
     * @return mixed
     */
    public function getIdTask()
    {
        return $this->id_task;
    }

    /**
     * @param mixed $id_task
     */
    public function setIdTask($id_task)
    {
        $this->id_task = $id_task;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * @param mixed $resume
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
    }

    /**
     * @return mixed
     */
    public function getCreateadAt()
    {
        return $this->createad_at;
    }

    /**
     * @param mixed $createad_at
     */
    public function setCreateadAt($createad_at)
    {
        $this->createad_at = $createad_at;
    }

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
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

}