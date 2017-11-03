<?php
    namespace Lddt\MainBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    /**
     * Category
     *
     * @ORM\Table(name="category")
     * @ORM\Entity(repositoryClass="Lddt\MainBundle\Repository\CategoryRepository")
     */
    class Category{
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
         * @ORM\Column(name="name", type="string", length=255)
         */
        private $name;
        /**
         * Pour palier a l'erreur can't convert objet to string
         * @return string
         */
        public function __toString(){
            // TODO: Implement __toString() method.
            return $this->name;
    
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
         * Set name
         *
         * @param string $name
         *
         * @return Category
         */
        public function setName($name){
            $this->name = $name;
            return $this;
        }
        /**
         * Get name
         *
         * @return string
         */
        public function getName(){
            return $this->name;
        }
    }

