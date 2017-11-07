<?php
    namespace Semio\MainBundle\Controller;
    use Semio\MainBundle\Entity\Place;
    use Semio\MainBundle\Entity\Topic;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Semio\MainBundle\Entity\Seminar;
    use Symfony\Component\HttpFoundation\Request;
    class DefaultController extends Controller{
        /**
         * Sidebar technique variable en globale
         * avec le twig associé
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function sideBarAction(){
            $topics   = $this->get('doctrine')->getRepository('SemioMainBundle:Topic')->findall();
            $speakers = $this->get('doctrine')->getRepository('SemioUserBundle:Speaker')->findall();
            return $this->render('SemioMainBundle:Partial:side.html.twig', ['topics' => $topics, 'speakers' => $speakers]);
        }
        /**
         * Page principale
         *
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function indexAction(){
            $seminars = $this->get('doctrine')->getRepository('SemioMainBundle:Seminar')->findAll();
            return $this->render('SemioMainBundle:Default:index.html.twig', ['seminars' => $seminars]);
        }
        /**
         * @Template()
         * @param Seminar $seminar
         * @return array
         */
        public function seminarAction(Seminar $seminar){
            $data = ['seminar' => $seminar];
            return $data;
        }
        /**
         * @param Place $place
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function placeAction(Place $place){
            $seminars = $this->get('doctrine')->getRepository('SemioMainBundle:Seminar')->findAllSeminarByPlace($place);
            return $this->render('SemioMainBundle:Default:index.html.twig', ['seminars' => $seminars, 'place' => $place]);
        }
        /**
         * @Template()
         * @param Topic   $topic
         * @param Seminar $seminars
         * @return array
         */
        public function topicAction(Topic $topic, Seminar $seminars){
            $datas = ['topic' => $topic, 'seminars' => $seminars];
            return $datas;
        }
        /**
         * @Template()
         * @param Request $request
         * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
         */
        public function newSeminarAction(Request $request){
            $em = $this->get('doctrine')->getManager();
            $form = $this->createForm(Seminar::class, new Seminar());
            $formHandler = new FormHandler($form, $request, $em);
            $data = [];
            if($formHandler->process() == true){
                $this->addFlash('success', 'Un nouveau séminaire a été ajouté !');
                return $this->redirectToRoute('semio_user_homepage');
            }
            return $data;
        }
        /**
         * @Template()
         * @param Request $request
         * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
         */
        public function newTopicAction(Request $request){
            $em = $this->get('doctrine')->getManager();
            $form = $this->createForm(Seminar::class, new Topic());
            $formHandler = new FormHandler($form, $request, $em);
            $data = [];
            if($formHandler->process() == true){
                $this->addFlash('success', 'Un nouveau theme a été ajouté !');
                return $this->redirectToRoute('semio_user_homepage');
            }
            return $data;
        }
        /**
         * @Template()
         * @param Request $request
         * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
         */
        public function newPlaceAction(Request $request){
            $em = $this->get('doctrine')->getManager();
            $form = $this->createForm(Seminar::class, new Place());
            $formHandler = new FormHandler($form, $request, $em);
            $data = [];
            if($formHandler->process() == true){
                $this->addFlash('success', 'Un nouveau lieu de conférence a été ajouté !');
                return $this->redirectToRoute('semio_user_homepage');
            }
            return $data;
        }
    }
