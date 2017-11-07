<?php
    namespace Semio\MainBundle\Repository;
    use Doctrine\ORM\EntityRepository;
    /**
     * SeminarRepository
     *
     * This class was generated by the Doctrine ORM. Add your own custom
     * repository methods below.
     */
    class SeminarRepository extends EntityRepository{
    
    
        public function findAllSeminarByPlace($place){
            $q = $this->createQueryBuilder('s')
                ->join('s.place', 'p')
                ->join('s.topic', 't')
                ->where('s.place = :pla')
                ->setParameter('pla', $place)
                ->addSelect('p', 't')
                ->orderBy('s.date', 'DESC');
            return $q->getQuery()->getResult();
        }
        
       /*
        
        
        
        
        public function findAllDrawsByCat($category) {
            $q = $this->createQueryBuilder('d')
                      ->join('d.category', 'c')
                      ->join('d.author','a')
                      ->where('d.category = :cat')
                      ->andWhere('d.isOnline = true')
                      ->setParameter('cat',$category)
                      ->addSelect('c','a')
                      ->orderBy('d.createdAt','DESC');
            return $q->getQuery()->getResult();
        }
        
        
        
        
        public function findAllce(array $place){
            $q = $this->createQueryBuilder('seminar');
            $q->join('seminar.place', 'place')
              ->join('seminar.topic', 'topic')
              ->where($q->expr()->in('place.nom', $place))
              ->setParameter('place', $place)
              ->addSelect('place', 'topic')
              ->orderBy('seminar.date', 'DESC');
            return $q->getQuery()->getResult();
        }*/
    }
