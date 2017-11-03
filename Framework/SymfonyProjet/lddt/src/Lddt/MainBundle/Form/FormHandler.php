<?php
    namespace Lddt\MainBundle\Form;
    use Doctrine\ORM\EntityManager;
    use Symfony\Component\Form\Form;
    use Symfony\Component\HttpFoundation\Request;
    class FormHandler{
        private $form;
        private $request;
        private $em;
        /**
         * FormHandler constructor.
         *
         * typer le constructeur s'appel une injection de dépendence
         * @param Form          $form
         * @param Request       $request
         * @param EntityManager $em
         *
         */
        public function __construct(Form $form, Request $request, EntityManager $em){
            //hydrater
            $this->request = $request;
            $this->form = $form;
            $this->em = $em;
        }
        /**
         *Vérifier les données du formulaire
         * @return bool
         */
        public function process(){
            if($this->request->getMethod() == 'POST'){
                $this->form->handleRequest($this->request);
                if($this->form->isValid() == true){
                    //si le formulaire est valide
                        //On persiste les données du form dans la db
                    $this->onSuccess($this->form->getData());
                    return true;
                }
                return false;
            }
            return false;
        }
        /**
         * @param $instence
         */
        private function onSuccess($instence){
            $this->em->persist($instence);
            $this->em->flush();
        }
    }