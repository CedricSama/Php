<?php
    namespace Semio\UserBundle\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    class DefaultController extends Controller{
        public function indexAction(){
            return $this->render('SemioUserBundle:Default:index.html.twig');
        }
    }
