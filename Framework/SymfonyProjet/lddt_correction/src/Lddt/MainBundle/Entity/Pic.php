<?php

namespace Lddt\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Pic
 *
 * @ORM\Table(name="pic")
 * @ORM\Entity(repositoryClass="Lddt\MainBundle\Repository\PicRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Pic
{

    /**
     * @ORM\OneToOne(targetEntity="Lddt\MainBundle\Entity\Draw",mappedBy="pic")
     */
    private $draw;

    /**
     * @ORM\OneToOne(targetEntity="Lddt\UserBundle\Entity\User",mappedBy="avatar")
     */
    private $avatar;



    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @Assert\File(
     *     maxSize="1024k",
     *     maxSizeMessage="Votre image ne doit pas dépasser 1 Mo",
     *     mimeTypes={"image/gif","image/jpeg","image/png"},
     *     mimeTypesMessage="Merci de charger une image de type gif,jpg ou png"
     * )
     */
    private $file;

    public function getFile() {
        return $this->file;
    }

    public function setFile(UploadedFile $file) {
        $this->file = $file;
        return $this;
    }

    // Retourner le chemin absolu d'un fichier
    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }
    public function getUploadRootDir() {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    public function getUploadDir() {
        return "uploads/pics";
    }
    // Méthode pour afficher les images téléchargées à partir des template de vues Twig
    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    /**
     * @ORM\PreFlush
     * @ORM\PreUpdate
     */
    public function preUpload() {
        // Si fichier téléchargé
        if(null !== $this->file) {
            $this->path = sha1(uniqid()).'.'.$this->file->guessExtension();
            // ex nom img > koala.jpg devient 45453421ddgg.jpg
        }
    }

    /**
     * @ORM\PostPersist
     * @ORM\PostUpdate
     */
    public function upload() {
        if(null === $this->file) {
            return false;
        }
        // Téléchargement de l'image à chaque fois qu'une entité PIC est créée ou mise à jour
        $this->file->move($this->getUploadRootDir(),$this->path);
        $this->file = null;
    }






    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Pic
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }




    /**
     * Set avatar
     *
     * @param \Lddt\UserBundle\Entity\User $avatar
     *
     * @return Pic
     */
    public function setAvatar(\Lddt\UserBundle\Entity\User $avatar = null)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return \Lddt\UserBundle\Entity\User
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set draw
     *
     * @param \Lddt\MainBundle\Entity\Draw $draw
     *
     * @return Pic
     */
    public function setDraw(\Lddt\MainBundle\Entity\Draw $draw = null)
    {
        $this->draw = $draw;

        return $this;
    }

    /**
     * Get draw
     *
     * @return \Lddt\MainBundle\Entity\Draw
     */
    public function getDraw()
    {
        return $this->draw;
    }
}
