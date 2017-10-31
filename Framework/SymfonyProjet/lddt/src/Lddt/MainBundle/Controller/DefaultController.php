<?php
    namespace Lddt\MainBundle\Controller;
    use Lddt\MainBundle\Entity\Draw;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\Validator\Constraints\DateTime;
    class DefaultController extends Controller{
        public function indexAction(){
            return $this->render('LddtMainBundle:Default:index.html.twig');
        }
        public function createAction(){
            //Instancier des dessins sans formulaire
            //hydrater de valeurs
            $draw = new Draw();
            $draw->setTitle("Cochonou");
            $draw->setDrawPath('cochonou.jpd');
            $draw->setAuthorName('Maire');
            $draw->setAuthorAvatarPath('marie-ico.jpg');
            //Ces donnée on ete placé dans le constructeurs
            // $draw->setIsOnline(true);
            // $draw->setCreatedAt(new \DateTime());
            // $draw->setUpdatedAt(new \DateTime());
            $em = $this->get('doctrine')->getManager();
            //verifie la requete
            $em->persist($draw);
            //apres tout les persist il execute la ou les requete(s)
            $em->flush();
            return $this->redirect('lddt_main_homepage');
        }
    }
