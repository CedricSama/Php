<?php
    namespace Lddt\MainBundle\Controller;
    use Lddt\MainBundle\Entity\Draw;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    class AdminController extends Controller{
        /**
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function indexAction(){
            $draws_to_moderate = $this->get('doctrine')
                                      ->getRepository('LddtMainBundle:Draw')
                                      ->findAllDraws(0);
            return $this->render('LddtMainBundle:Admin:index.html.twig', ['draws'=>$draws_to_moderate]);
        }
        
        public function publishedAction(Draw $draw){
            $draw->setIsOnline(true);
            $em = $this->get('doctrine')->getManager();
            $em->persist($draw);
            $em->flush();
            $this->addFlash('success', "le dessin {$draw->getTitle()} a été mis en ligne");
            return $this->redirectToRoute("lddt_admin_index");
        }
    }
