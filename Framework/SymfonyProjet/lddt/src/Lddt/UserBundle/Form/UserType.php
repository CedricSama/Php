<?php
    namespace Lddt\UserBundle\Form;
 
    use Lddt\MainBundle\Form\PicType;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    class UserType extends AbstractType{
        /**
         * {@inheritdoc}
         */
        public function buildForm(FormBuilderInterface $builder, array $options){
            $builder->add('prenom', TextType::class, ['label'=>'Votre prénom', 'attr'=>['class'=>'form-controle']])
                    ->add('nom', TextType::class, array('label'=>'Votre prénom', 'attr'=>array('class'=>'form-controle')))
                    ->add('avatar', PicType::class, ['label'=>false]);
        }
        /**
         * On recupere leurs classe
         * grace a la methode getParent, puis on inject notre formulaire grace a buildForm
         * car dans la vue register_content ils utilisent la methode {{ form_widget(form) }}
         * ensuite dans le config.ymg on y ajoute notre formulaire
         * (registration:
                        form:
                            type: Lddt\UserBundle\Form\UserType)
         * @return string
         */
        public function getParent(){
            return 'FOS\UserBundle\Form\Type\RegistrationFormType';
        }
        /**
         * {@inheritdoc}
         */
        public function configureOptions(OptionsResolver $resolver){
            $resolver->setDefaults(array('data_class' => 'Lddt\UserBundle\Entity\User'));
        }
        /**
         * {@inheritdoc}
         */
        public function getBlockPrefix(){
            return 'lddt_userbundle_user';
        }
    }
