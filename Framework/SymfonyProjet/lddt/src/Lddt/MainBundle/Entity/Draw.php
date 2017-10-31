<?php
    namespace Lddt\MainBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    /**
     * Draw
     *
     * @ORM\Table(name="draw")
     * @ORM\Entity(repositoryClass="Lddt\MainBundle\Repository\DrawRepository")
     */
    class Draw{
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
         * @ORM\Column(name="title", type="string", length=255)
         */
        private $title;
        /**
         * @var string
         *
         * @ORM\Column(name="draw_path", type="string", length=255)
         */
        private $drawPath;
        /**
         * @var bool
         *
         * @ORM\Column(name="is_online", type="boolean")
         */
        private $isOnline;
        /**
         * @var string
         *
         * @ORM\Column(name="author_name", type="string", length=255, nullable=true)
         */
        private $authorName;
        /**
         * @var string
         *
         * @ORM\Column(name="author_avatar_path", type="string", length=255, nullable=true)
         */
        private $authorAvatarPath;
        /**
         * @var \DateTime
         *
         * @ORM\Column(name="created_at", type="datetime")
         */
        private $createdAt;
        /**
         * @var \DateTime
         *
         * @ORM\Column(name="updated_at", type="datetime")
         */
        private $updatedAt;
        /**
         * Clé etrangère venant de Category
         * Plusieurs Dessins (Many) dans (To) une catégorie (One)
         * @ORM\ManyToOne(targetEntity="Lddt\MainBundle\Entity\Category")
         * @ORM\JoinColumn(name="id_category", referencedColumnName="id", onDelete="CASCADE")
         */
        private $category;
        /**
         * ManyToMany
         * @ORM\ManyToMany(targetEntity="Lddt\MainBundle\Entity\Color", cascade={"persist"})
         *
         * @var
         */
        private $colors;
        /**
         * Draw constructor.
         *
         * @param bool $is_online
         */
        public function __construct($is_online = true){
            $this->setCreatedAt(new \DateTime());
            $this->setUpdatedAt(new \DateTime());
            $this->setIsOnline($is_online);
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
         * Set title
         *
         * @param string $title
         *
         * @return Draw
         */
        public function setTitle($title){
            $this->title = $title;
            return $this;
        }
        /**
         * Get title
         *
         * @return string
         */
        public function getTitle(){
            return $this->title;
        }
        /**
         * Set drawPath
         *
         * @param string $drawPath
         *
         * @return Draw
         */
        public function setDrawPath($drawPath){
            $this->drawPath = $drawPath;
            return $this;
        }
        /**
         * Get drawPath
         *
         * @return string
         */
        public function getDrawPath(){
            return $this->drawPath;
        }
        /**
         * Set isOnline
         *
         * @param boolean $isOnline
         *
         * @return Draw
         */
        public function setIsOnline($isOnline){
            $this->isOnline = $isOnline;
            return $this;
        }
        /**
         * Get isOnline
         *
         * @return bool
         */
        public function getIsOnline(){
            return $this->isOnline;
        }
        /**
         * Set authorName
         *
         * @param string $authorName
         *
         * @return Draw
         */
        public function setAuthorName($authorName){
            $this->authorName = $authorName;
            return $this;
        }
        /**
         * Get authorName
         *
         * @return string
         */
        public function getAuthorName(){
            return $this->authorName;
        }
        /**
         * Set authorAvatarPath
         *
         * @param string $authorAvatarPath
         *
         * @return Draw
         */
        public function setAuthorAvatarPath($authorAvatarPath){
            $this->authorAvatarPath = $authorAvatarPath;
            return $this;
        }
        /**
         * Get authorAvatarPath
         *
         * @return string
         */
        public function getAuthorAvatarPath(){
            return $this->authorAvatarPath;
        }
        /**
         * Set createdAt
         *
         * @param \DateTime $createdAt
         *
         * @return Draw
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
         * @return Draw
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
         * Set category
         *
         * @param \Lddt\MainBundle\Entity\Category $category
         *
         * @return Draw
         */
        public function setCategory(Category $category = null){
            $this->category = $category;
            return $this;
        }
        /**
         * Get category
         *
         * @return \Lddt\MainBundle\Entity\Category
         */
        public function getCategory(){
            return $this->category;
        }
        /**
         * Add color
         *
         * @param \Lddt\MainBundle\Entity\Color $color
         *
         * @return Draw
         */
        public function addColor(Color $color){
            $this->colors[] = $color;
            return $this;
        }
        /**
         * Remove color
         *
         * @param \Lddt\MainBundle\Entity\Color $color
         */
        public function removeColor(Color $color){
            $this->colors->removeElement($color);
        }
        /**
         * Get colors
         *
         * @return \Doctrine\Common\Collections\Collection
         */
        public function getColors(){
            return $this->colors;
        }
    }
