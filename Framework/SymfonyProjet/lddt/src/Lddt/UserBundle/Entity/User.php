<?php
    namespace Lddt\UserBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    use FOS\UserBundle\Model\User as BaseUser;
    use Lddt\MainBundle\Entity\Pic;
    /**
     * Class User
     * @ORM\Table(name="user")
     * @ORM\Entity(repositoryClass="Lddt\UserBundle\Repository\UserRepository")
     *
     * @package Lddt\UserBundle\Entity
     */
    class User extends BaseUser{
        /**
         * @var int
         * Mise en place d'un protected a la place de private pour garder l'id recupéré
         * parce qu'on a extend de BaseUser et qu'il posede deja un id donc on protected pour garder
         * le leurs qui permet de garder la liaison
         * @ORM\Column(name="id", type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;
        /**
         * @var string
         *
         * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
         */
        private $prenom;
        /**
         * @var string
         *
         * @ORM\Column(name="nom", type="string", length=255, nullable=true)
         */
        private $nom;
        /**
         * Clé étrangere ajouté apres création
         * ensuite update de la class avec un schema update force (evidement controllé avec la requete dump-sql)
         * @ORM\OneToOne(targetEntity="Lddt\MainBundle\Entity\Pic", inversedBy="avatar", cascade={"persist"})
         * @ORM\JoinColumn(name="id_avatar", referencedColumnName="id")
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
         * Set prenom
         *
         * @param string $prenom
         *
         * @return User
         */
        public function setPrenom($prenom){
            $this->prenom = $prenom;
            return $this;
        }
        /**
         * Get prenom
         *
         * @return string
         */
        public function getPrenom(){
            return $this->prenom;
        }
        /**
         * Set nom
         *
         * @param string $nom
         *
         * @return User
         */
        public function setNom($nom){
            $this->nom = $nom;
            return $this;
        }
        /**
         * Get nom
         *
         * @return string
         */
        public function getNom(){
            return $this->nom;
        }
        /**
         * Set avatar
         *
         * @param \Lddt\MainBundle\Entity\Pic $avatar
         *
         * @return User
         */
        public function setAvatar(Pic $avatar = null){
            $this->avatar = $avatar;
            return $this;
        }
        /**
         * Get avatar
         *
         * @return \Lddt\MainBundle\Entity\Pic
         */
        public function getAvatar(){
            return $this->avatar;
        }
    }
