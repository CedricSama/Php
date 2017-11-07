<?php
    namespace Semio\UserBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    use FOS\UserBundle\Model\User as BaseUser;
    /**
     * Speaker
     *
     * @ORM\Table(name="speaker")
     * @ORM\Entity(repositoryClass="Semio\UserBundle\Repository\SpeakerRepository")
     */
    class Speaker extends BaseUser{
        /**
         * @var int
         *
         * @ORM\Column(name="id", type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;
        /**
         * @var string
         *
         * @ORM\Column(name="nom", type="string", length=255)
         */
        private $nom;
        /**
         * @var string
         *
         * @ORM\Column(name="prenom", type="string", length=255)
         */
        private $prenom;
        /**
         * @var string
         *
         * @ORM\Column(name="bio", type="string", length=255)
         */
        private $bio;
        /**
         * @var string
         *
         * @ORM\Column(name="web", type="string", length=255)
         */
        private $web;
        /**
         * @var bool
         *
         * @ORM\Column(name="role", type="boolean")
         */
        private $role;
        /**
         * @var bool
         *
         * @ORM\Column(name="is_admin", type="boolean")
         */
        private $isAdmin;
        /**
         * @var \DateTime
         * @ORM\Column(name="created_at", type="datetime")
         */
        private $createdAt;
        /**
         * @var \DateTime
         * @ORM\Column(name="updated_at", type="datetime")
         */
        private $updatedAt;
        /**
         * Get id
         *
         * @return int
         */
        public function getId(){
            return $this->id;
        }
        /**
         * Set nom
         *
         * @param string $nom
         *
         * @return Speaker
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
         * Set prenom
         *
         * @param string $prenom
         *
         * @return Speaker
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
         * Set bio
         *
         * @param string $bio
         *
         * @return Speaker
         */
        public function setBio($bio){
            $this->bio = $bio;
            return $this;
        }
        /**
         * Get bio
         *
         * @return string
         */
        public function getBio(){
            return $this->bio;
        }
        /**
         * Set web
         *
         * @param string $web
         *
         * @return Speaker
         */
        public function setWeb($web){
            $this->web = $web;
            return $this;
        }
        /**
         * Get web
         *
         * @return string
         */
        public function getWeb(){
            return $this->web;
        }
        /**
         * Set role
         *
         * @param boolean $role
         *
         * @return Speaker
         */
        public function setRole($role){
            $this->role = $role;
            return $this;
        }
        /**
         * Get role
         *
         * @return bool
         */
        public function getRole(){
            return $this->role;
        }
        /**
         * Set isAdmin
         *
         * @param boolean $isAdmin
         *
         * @return Speaker
         */
        public function setIsAdmin($isAdmin){
            $this->isAdmin = $isAdmin;
            return $this;
        }
        /**
         * Get isAdmin
         *
         * @return boolean
         */
        public function getIsAdmin(){
            return $this->isAdmin;
        }
        /**
         * Set createdAt
         *
         * @param \DateTime $createdAt
         *
         * @return Speaker
         */
        public function setCreatedAt($createdAt){
            $this->createdAt = $createdAt;
            return $this;
        }
        /**
         * Get createdAt
         *
         * @return \DateTime
         */
        public function getCreatedAt(){
            return $this->createdAt;
        }
        /**
         * Set updatedAt
         *
         * @param \DateTime $updatedAt
         *
         * @return Speaker
         */
        public function setUpdatedAt($updatedAt){
            $this->updatedAt = $updatedAt;
            return $this;
        }
        /**
         * Get updatedAt
         *
         * @return \DateTime
         */
        public function getUpdatedAt(){
            return $this->updatedAt;
        }
    }
