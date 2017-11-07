<?php
    namespace Lddt\MainBundle\Controller;
    use Lddt\MainBundle\Entity\Draw;
    use Lddt\MainBundle\Form\DrawType;
    use Lddt\MainBundle\Form\FormHandler;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Lddt\MainBundle\Entity\Category;
    use Symfony\Component\Validator\Constraints\DateTime;
    class DefaultController extends Controller{
        public function indexAction(){
            $draws = $this->get('doctrine')->getRepository('LddtMainBundle:Draw')->findAllDraws();
            return $this->render('LddtMainBundle:Default:index.html.twig',['draws'=>$draws]);
        }
        /*public function createAction(){
            //Instancier des dessins sans formulaire
            //hydrater de valeurs
            // $draw = new Draw();
            // $draw->setTitle("Fred");
            // $draw->setDrawPath('fred.jpd');
            // $draw->setAuthorName('Maire');
            // $draw->setAuthorAvatarPath('marie-ico.jpg');
            //Ces donnée on ete placé dans le constructeurs
            // $draw->setIsOnline(true);
            // $draw->setCreatedAt(new \DateTime());
            // $draw->setUpdatedAt(new \DateTime());
            //Créer une catégorie
            // $category = new Category();
            // $category->setName('visage');
            //Associer le dessin et la categorie
            // $draw->setCategory($category);
            //Recupere les services de l'objet doctrine
            // $em = $this->get('doctrine')->getManager();
            //verifie la requete
            // $em->persist($draw);
            // $em->persist($category);
            //apres tout les persist il execute la ou les requete(s)
            // $em->flush();
            // return $this->redirectToRoute('lddt_main_homepage');
        }*/
        /**
         * attention au Template()
         * parametre qui permet de savoir la route
         * quand on return $datas
         * @param Request $request
         * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
         * @Template()
         */
        public function createAction(Request $request){
            $em = $this->get('doctrine')->getManager();
            $form = $this->createForm(DrawType::class, new Draw());
            $datas = ['form'=> $form->createView()];
            $formHandler = new FormHandler($form, $request, $em);
            if($formHandler->process() == true){
                $this->addFlash('success', 'Dessin ajouté !');
                return $this->redirectToRoute('lddt_main_homepage');
            }
            return $datas;
        }
        /* // La premiere méthode est la methode classic
        // la deuxieme est la meme chose de facon optimisé grace a l'usilisation de Sensio\Bundle\FrameworkExtraBundle\Configuration\Template
               public function showAction($id){
            $draw = $this->get('doctrine')->getRepository('LddtMainBundle:Draw')->find($id);
            return $this->render('LddtMainBundle:Default:show.html.twig', ['draw'=>$draw]);
        }*/
        /**
         * @param Draw $draw
         * @Template()
         * @return array
         */
        public function showAction(Draw $draw){
            $datas = ['draw'=>$draw];
            return $datas;
        }
        /**
         * @param Category $category
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function drawsByCatAction(Category $category){
            //Le fait de mettre un type nous permet de ne pas ecrire la ligne suivante
            /*$category = $this->get('doctrine')->getRepository('LddtMainBundle:Category')->find($id);*/
            $draws = $this->get('doctrine')->getRepository('LddtMainBundle:Draw')->findAllDrawsByCat($category);
            return $this->render('LddtMainBundle:Default:index.html.twig', ['draws'=>$draws, 'category'=>$category]);
        }
        /**
         * @param Draw    $draw
         * @param Request $request
         * @Template()
         * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
         */
        public function editAction(Draw $draw, Request $request){
            //Ne pas oublié de passer la requete draw en parametre
            $form = $this->createForm(DrawType::class, $draw);
            $em = $this->get('doctrine')->getManager();
            $formHandler = new FormHandler($form, $request, $em);
            if($formHandler->process() == true){
                $this->addFlash('success', "Dessin {$draw->getTitle()} modifier");
                return $this->redirectToRoute('lddt_main_homepage');
            }
            return ['draw'=>$draw, 'form'=>$form->createView()];
        }
        /**
         * @param Draw $draw
         * @return \Symfony\Component\HttpFoundation\RedirectResponse
         */
        public function deleteAction(Draw $draw){
            $em = $this->get('doctrine')->getManager();
            $em->remove($draw);
            $em->flush();
            $this->addFlash('success', "Le dessin {$draw->getTitle()} a été supprimé !");
            return $this->redirectToRoute('lddt_main_homepage');
        }
    }
