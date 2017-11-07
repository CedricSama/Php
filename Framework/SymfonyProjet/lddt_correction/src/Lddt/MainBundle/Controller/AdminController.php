<?php

namespace Lddt\MainBundle\Controller;

use Lddt\MainBundle\Entity\Draw;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        $draws_to_moderate = $this->get('doctrine')->getRepository('LddtMainBundle:Draw')->findAllDraws(0);

        return $this->render('LddtMainBundle:Admin:index.html.twig', array(
            'draws'=>$draws_to_moderate
        ));
    }

    public function publishAction(Draw $draw) {
        $draw->setIsOnline(true);
        $draw->setModerateur($this->getUser());
        $em = $this->get('doctrine')->getManager();
        $em->persist($draw);
        $em->flush();
        $this->addFlash('success',"le dessin {$draw->getTitle()} a été mis en ligne");
        return $this->redirectToRoute("index");
    }

}
