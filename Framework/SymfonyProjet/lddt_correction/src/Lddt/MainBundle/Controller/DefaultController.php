<?php

namespace Lddt\MainBundle\Controller;

use Lddt\MainBundle\Entity\Category;
use Lddt\MainBundle\Entity\Color;
use Lddt\MainBundle\Entity\Comment;
use Lddt\MainBundle\Entity\Draw;
use Lddt\MainBundle\Form\CommentType;
use Lddt\MainBundle\Form\DrawType;
use Lddt\MainBundle\Form\FormHandler;
use Lddt\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $draws = $this->get('doctrine')->getRepository('LddtMainBundle:Draw')->findAllDraws();

        return $this->render('LddtMainBundle:Default:index.html.twig',['draws'=>$draws]);
    }
//    public function showAction($id) {
////        $draw = $this->get('doctrine')->getRepository('LddtMainBundle:Draw')->find($id);
//        return $this->render('LddtMainBundle:Default:show.html.twig',['draw'=>$draw]);
//    }

    public function drawsByCatAction(Category $category) {
//$category = $this->get('doctrine')->getRepository('LddtMainBundle:Category')->find($id);
        $draws = $this->get('doctrine')
            ->getRepository('LddtMainBundle:Draw')
            ->findAllDrawsByCat($category);
        return $this->render('LddtMainBundle:Default:index.html.twig',
            ['draws'=>$draws,'category'=>$category]);
    }

    public function drawByAuthorAction(User $user) {
        $draws = $this->get('doctrine')
            ->getRepository('LddtMainBundle:Draw')
            ->findAllDrawsByAuthor($user);
        return $this->render('LddtMainBundle:Default:index.html.twig',
            ['draws'=>$draws,'author'=>$user]);
    }



    /**
     * @param Draw $draw
     * @Template()
     */
    public function showAction(Draw $draw,Request $request) {
        $is_author = $this->getUser() == $draw->getAuthor() ? true : false;
        $datas = ['draw'=>$draw,'is_author'=>$is_author];
        if($this->isGranted('ROLE_USER')) {
            $form = $this->createForm(CommentType::class,new Comment($draw,$this->getUser()));
            $em = $this->get('doctrine')->getManager();
            $formHandler = new FormHandler($form,$request,$em);
            if($formHandler->process() == true) {
                $this->addFlash('success','Commentaire ajouté !');
                return $this->redirectToRoute('lddt_main_show',['id'=>$draw->getId()]);
            }
            $datas['form'] = $form->createView();
        }

        return $datas;
    }
    /**
     * @Template()
     */
    public function createAction(Request $request) {
        // Instancier des dessins sans formulaire
//        $draw = new Draw();
//        $draw->setTitle("Lost");
//        $draw->setDrawPath('lost.jpg');
//        $draw->setAuthorName('Fanch');
//        $draw->setAuthorAvatarPath('fanch-ico.jpg');
//
//        // Créer une catégorie
//        $category = new Category();
//        $category->setName("Sport");
//
//        // Associer le dessin et la catégorie
//        $draw->setCategory($category);
//
//        $em = $this->get('doctrine')->getManager();
//        $em->persist($draw);
//        $em->persist($category);
//        $em->flush();
        $em = $this->get('doctrine')->getManager();
        $author = $this->getUser();
        $datas = [];
        if($this->isGranted('ROLE_USER')) {
            $form = $this->createForm(DrawType::class,new Draw($author));
            $datas = ['form'=>$form->createView()];
            $formHandler = new FormHandler($form,$request,$em);
            if($formHandler->process() == true) {
                $this->addFlash('success','Dessin ajouté !');
                return $this->redirectToRoute('lddt_main_homepage');
            }
        }
        return $datas;
    }

    /**
     * @Template()
     */
    public function editAction(Draw $draw,Request $request) {
        if($this->checkAuthorization($draw->getAuthor()) == false) {
            return $this->redirectToRoute('lddt_main_homepage');
        }
        $form = $this->createForm(DrawType::class,$draw);
        $em = $this->get('doctrine')->getManager();
        $formHandler = new FormHandler($form,$request,$em);
        if($formHandler->process() == true) {
            $this->addFlash('success',"Dessin {$draw->getTitle()} modifié !");
            return $this->redirectToRoute('lddt_main_homepage');
        }

//        $prenom = "kitty";
//        $string = 'Le Petit chat s\'appelle '.$prenom;
//        $string = "Le Petit chat s\'appelle $prenom";
//        $string = "Le Petit chat s\'appelle {$prenom->getPrenom()}";

        return ['draw'=>$draw,'form'=>$form->createView()];
    }

    public function deleteAction($id) {
        $draw = $this->get('doctrine')->getRepository('LddtMainBundle:Draw')->find($id);
        if($this->checkAuthorization($draw->getAuthor()) == false) {
            return $this->redirectToRoute('lddt_main_homepage');
        }
        $em = $this->get('doctrine')->getManager();
        $em->remove($draw);
        $em->flush();
        $this->addFlash('success',"Le dessin {$draw->getTitle()} a été supprimé !");
        return $this->redirectToRoute('lddt_main_homepage');
    }

    private function checkAuthorization($author) {
        // Soit le user connecté est admin
        if($this->isGranted('ROLE_ADMIN')) {
            return true;
        }
        // Soit le user connecté est auteur du dessin
        else if($this->getUser() == $author) {
            return true;
        }
        // Soit il n'est ni l'un ni l'autre > donc refus
        else {
            return false;
        }
    }

    public function findAllDrawsByColorAction(Color $color) {
        $draws = $this->get('doctrine')->getRepository('LddtMainBundle:Draw')->findAllDrawsByColor([$color->getName()]);

        return $this->render('LddtMainBundle:Default:index.html.twig',["draws"=>$draws,'color'=>$color]);
    }
}
