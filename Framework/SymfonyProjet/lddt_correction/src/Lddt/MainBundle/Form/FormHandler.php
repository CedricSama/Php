<?php
namespace Lddt\MainBundle\Form;


use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class FormHandler
{
    private $form;
    private $request;
    private $em;

    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->request = $request;
        $this->form = $form;
        $this->em = $em;
    }

    // Vérfier les données du formulaires
    public function process() {
        if($this->request->getMethod() == 'POST') {
            $this->form->handleRequest($this->request);
            if($this->form->isValid() == true) {
             //  si form valide
                // on persiste les données du form dans la db
                $this->onSuccess($this->form->getData());
                return true;
            }
            return false;
        }
        return false;
    }

    private function onSuccess($instance) {
        $this->em->persist($instance);
        $this->em->flush();
    }


}