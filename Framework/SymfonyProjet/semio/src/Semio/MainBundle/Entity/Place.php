<?php
    namespace Semio\MainBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    /**
     * Place
     *
     * @ORM\Table(name="place")
     * @ORM\Entity(repositoryClass="Semio\MainBundle\Repository\PlaceRepository")
     */
    class Place{
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
         * @ORM\Column(name="nom", type="string", length=255)
         */
        private $nom;
        /**
         * @var string
         *
         * @ORM\Column(name="adresse", type="string", length=255, unique=true)
         */
        private $adresse;
        /**
         * @var integer
         *
         * @ORM\Column(name="nb_place", type="integer", length=255, nullable=true)
         */
        private $taille;
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
         * @return Place
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
         * Set adresse
         *
         * @param string $adresse
         *
         * @return Place
         */
        public function setAdresse($adresse){
            $this->adresse = $adresse;
            return $this;
        }
        /**
         * Get adresse
         *
         * @return string
         */
        public function getAdresse(){
            return $this->adresse;
        }
        /**
         * Set createdAt
         *
         * @param \DateTime $createdAt
         *
         * @return Place
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
         * @return Place
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
    
    /**
     * Set taille
     *
     * @param integer $taille
     *
     * @return Place
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return integer
     */
    public function getTaille()
    {
        return $this->taille;
    }
}
