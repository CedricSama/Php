<?php
    namespace Lddt\MainBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    use Lddt\UserBundle\Entity\User;
    use Symfony\Component\HttpFoundation\File\UploadedFile;
    use Symfony\Component\Validator\Constraints as Assert;
    /**
     * Pic
     *
     * @ORM\Table(name="pic")
     * @ORM\Entity(repositoryClass="Lddt\MainBundle\Repository\PicRepository")
     * @ORM\HasLifecycleCallbacks()
     */
    class Pic{
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
         * Pour tout test de validator,
         * on importe le "Use" constraints pour utiliser le Assert.
         * Ici on test le fichier
         * @Assert\File(
         *     maxSize="1024k",
         *     maxSizeMessage="Votre image ne doit pas dépasser 1Mo",
         *     mimeTypes={"image/gif","image/jpeg","image/png"},
         *     mimeTypesMessage="Merci de charger une image de type gif, jpg, ou png"
         * )
         */
        private $file;
        /**
         * @ORM\OneToOne(targetEntity="Lddt\MainBundle\Entity\Draw", mappedBy="pic")
         * @var
         */
        private $draw;
        /**
         * @var
         * @ORM\OneToOne(targetEntity="Lddt\UserBundle\Entity\User", mappedBy="avatar")
         */
        private $avatar;
        /**
         * Get id
         *
         * @return int
         */
        public function getId(){
            return $this->id;
        }
        /**
         * Set path
         *
         * @param string $path
         *
         * @return Pic
         */
        public function setPath($path){
            $this->path = $path;
            return $this;
        }
        /**
         * Get path
         *
         * @return string
         */
        public function getPath(){
            return $this->path;
        }
        /**
         * @return mixed
         */
        public function getFile(){
            return $this->file;
        }
        /**
         * @param UploadedFile $file
         * @return $this
         */
        public function setFile(UploadedFile $file){
            $this->file = $file;
            //ici le return this permet de pouvoir reutiliser l'instence sans faire appel a un new;
            return $this;
        }
        /**
         * Retourner le chemin absolu d'un fichier
         *
         * @return null|string
         */
        public function getAbsolutePath(){
            return null === $this->path? null:$this->getUploadRootDir().'/'.$this->path;
        }
        /**
         * @return string
         */
        public function getUploadRootDir(){
            return __DIR__.'/../../../../web/'.$this->getUploadDir();
        }
        /**
         * Créateur de dossier de stockage
         *
         * @return string
         */
        public function getUploadDir(){
            return "uploads/pics";
        }
        /**
         * Methode pour afficher les images téléchargées
         *  à partir des template de vues twig
         *
         * @return null|string
         */
        public function getWebPath(){
            return null === $this->path? null:$this->getUploadDir().'/'.$this->path;
        }
        /**
         * @ORM\PrePersist()
         * @ORM\PreUpdate()
         */
        public function preUpload(){
            //si le fichier est téléchargé
            if(null !== $this->file){
                $this->path = sha1(uniqid()).'.'.$this->file->guessExtension();
                //ex nom img > kpala.jpg devient 45453421ddgg.jpg
            }
        }
        /**
         * @ORM\PostPersist()
         * @ORM\PostUpdate()
         */
        public function upload(){
            if(null === $this->file){
                return false;
            }
            $this->file->move($this->getUploadDir(), $this->path);
            $this->file = null;
        }
        /**
         * Suppression du fichier si on supprime l'entité
         * @ORM\PostRemove()
         */
        public function remove(){
            if($file = $this->getAbsolutePath()){
                unlink($file);
            }
        }
        /**
         * Set draw
         *
         * @param \Lddt\MainBundle\Entity\Draw $draw
         *
         * @return Pic
         */
        public function setDraw(Draw $draw = null){
            $this->draw = $draw;
            return $this;
        }
        /**
         * Get draw
         *
         * @return \Lddt\MainBundle\Entity\Draw
         */
        public function getDraw(){
            return $this->draw;
        }
        /**
         * Set avatar
         *
         * @param \Lddt\UserBundle\Entity\User $avatar
         *
         * @return Pic
         */
        public function setAvatar(User $avatar = null){
            $this->avatar = $avatar;
            return $this;
        }
        /**
         * Get avatar
         *
         * @return \Lddt\UserBundle\Entity\User
         */
        public function getAvatar(){
            return $this->avatar;
        }
    }
