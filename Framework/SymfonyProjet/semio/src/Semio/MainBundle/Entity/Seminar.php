<?php
    namespace Semio\MainBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    use Semio\UserBundle\Entity\Speaker;
    /**
     * Seminar
     *
     * @ORM\Table(name="seminar")
     * @ORM\Entity(repositoryClass="Semio\MainBundle\Repository\SeminarRepository")
     */
    class Seminar{
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
         * @ORM\Column(name="titre", type="string", length=255)
         */
        private $titre;
        /**
         * @var string
         *
         * @ORM\Column(name="resume", type="text")
         */
        private $resume;
        /**
         * @var \DateTime
         *
         * @ORM\Column(name="date", type="date")
         */
        private $date;
        /**
         * @var \DateTime
         *
         * @ORM\Column(name="heure", type="time")
         */
        private $heure;
        /**
         * @var \DateTime
         * @ORM\Column(name="updated_at", type="datetime")
         */
        private $updatedAt;
        /**
         * @var
         * @ORM\ManyToOne(targetEntity="Semio\UserBundle\Entity\Speaker")
         * @ORM\JoinColumn(name="role", referencedColumnName="id", onDelete="SET NULL")
         */
        private $speaker;
        /**
         * @var
         * @ORM\ManyToOne(targetEntity="Semio\UserBundle\Entity\Speaker")
         * @ORM\JoinColumn(name="is_admin", referencedColumnName="id", onDelete="cascade")
         */
        private $admin;
        /**
         * @var
         * @ORM\ManyToOne(targetEntity="Semio\MainBundle\Entity\Place")
         * @ORM\JoinColumn(name="id_place", referencedColumnName="id", onDelete="SET NULL")
         */
        private $place;
        /**
         * @var
         * @ORM\ManyToMany(targetEntity="Semio\MainBundle\Entity\Topic", cascade={"persist"})
         */
        private $topic;
        /**
         * Constructor
         */
        public function __construct(){
            $this->admin = new \Doctrine\Common\Collections\ArrayCollection();
            $this->place = new \Doctrine\Common\Collections\ArrayCollection();
            $this->topic = new \Doctrine\Common\Collections\ArrayCollection();
            $this->date(new  \DateTime());
            $this->heure(new \DateTime());
        }
        /**
         * Get id
         *
         * @return int
         */
        public function getId(){
            return $this->id;
        }
        /**
         * Set titre
         *
         * @param string $titre
         *
         * @return Seminar
         */
        public function setTitre($titre){
            $this->titre = $titre;
            return $this;
        }
        /**
         * Get titre
         *
         * @return string
         */
        public function getTitre(){
            return $this->titre;
        }
        /**
         * Set resume
         *
         * @param string $resume
         *
         * @return Seminar
         */
        public function setResume($resume){
            $this->resume = $resume;
            return $this;
        }
        /**
         * Get resume
         *
         * @return string
         */
        public function getResume(){
            return $this->resume;
        }
        /**
         * Set updatedAt
         *
         * @param \DateTime $updatedAt
         *
         * @return Seminar
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
         * Set place
         *
         * @param \Semio\MainBundle\Entity\Place $place
         *
         * @return Seminar
         */
        public function setPlace(Place $place = null){
            $this->place = $place;
            return $this;
        }
        /**
         * Get place
         *
         * @return \Semio\MainBundle\Entity\Place
         */
        public function getPlace(){
            return $this->place;
        }
        /**
         * Add topic
         *
         * @param \Semio\MainBundle\Entity\Topic $topic
         *
         * @return Seminar
         */
        public function addTopic(Topic $topic){
            $this->topic[] = $topic;
            return $this;
        }
        /**
         * Remove topic
         *
         * @param \Semio\MainBundle\Entity\Topic $topic
         */
        public function removeTopic(Topic $topic){
            $this->topic->removeElement($topic);
        }
        /**
         * Get topic
         *
         * @return \Doctrine\Common\Collections\Collection
         */
        public function getTopic(){
            return $this->topic;
        }
        /**
         * Set date
         *
         * @param \DateTime $date
         *
         * @return Seminar
         */
        public function setDate($date){
            $this->date = $date;
            return $this;
        }
        /**
         * Get date
         *
         * @return \DateTime
         */
        public function getDate(){
            return $this->date;
        }
        /**
         * Set heure
         *
         * @param \DateTime $heure
         *
         * @return Seminar
         */
        public function setHeure($heure){
            $this->heure = $heure;
            return $this;
        }
        /**
         * Get heure
         *
         * @return \DateTime
         */
        public function getHeure(){
            return $this->heure;
        }
        /**
         * Set speaker
         *
         * @param \Semio\UserBundle\Entity\Speaker $speaker
         *
         * @return Seminar
         */
        public function setSpeaker(Speaker $speaker = null){
            $this->speaker = $speaker;
            return $this;
        }
        /**
         * Get speaker
         *
         * @return \Semio\UserBundle\Entity\Speaker
         */
        public function getSpeaker(){
            return $this->speaker;
        }
        /**
         * Set admin
         *
         * @param \Semio\UserBundle\Entity\Speaker $admin
         *
         * @return Seminar
         */
        public function setAdmin(Speaker $admin = null){
            $this->admin = $admin;
            return $this;
        }
        /**
         * Get admin
         *
         * @return \Semio\UserBundle\Entity\Speaker
         */
        public function getAdmin(){
            return $this->admin;
        }
    }
