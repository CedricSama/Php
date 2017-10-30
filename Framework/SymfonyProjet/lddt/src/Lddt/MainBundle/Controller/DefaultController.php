<?php
    namespace Lddt\MainBundle\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    class DefaultController extends Controller{
        public function indexAction(){
            return $this->render('LddtMainBundle:Default:index.html.twig');
        }
    }
