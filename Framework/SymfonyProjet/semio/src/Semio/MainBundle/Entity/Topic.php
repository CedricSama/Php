<?php
    namespace Semio\MainBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    /**
     * Topic
     *
     * @ORM\Table(name="topic")
     * @ORM\Entity(repositoryClass="Semio\MainBundle\Repository\TopicRepository")
     */
    class Topic{
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
         * @ORM\Column(name="nom", type="string", length=255, unique=true)
         */
        private $nom;
        /**
         * @var string
         *
         * @ORM\Column(name="description", type="text", nullable=true)
         */
        private $description;
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
         * @return Topic
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
         * Set description
         *
         * @param string $description
         *
         * @return Topic
         */
        public function setDescription($description){
            $this->description = $description;
            return $this;
        }
        /**
         * Get description
         *
         * @return string
         */
        public function getDescription(){
            return $this->description;
        }
        /**
         * Set createdAt
         *
         * @param \DateTime $createdAt
         *
         * @return Topic
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
         * @return Topic
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
