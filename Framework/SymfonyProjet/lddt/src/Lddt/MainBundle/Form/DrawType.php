<?php
    namespace Lddt\MainBundle\Form;
    use Symfony\Bridge\Doctrine\Form\Type\EntityType;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    class DrawType extends AbstractType{
        /**
         * {@inheritdoc}
         */
        public function buildForm(FormBuilderInterface $builder, array $options){
            $builder->add('title', TextType::class, [
                'label' => 'Nom du dessin',
                'attr' => ['class' => 'form-control']]);
            //->add('isOnline')
            //->add('createdAt')
            //->add('updatedAt')
            //->add('drawPath')
            //Formulaire imbriqué > permet de télécharger une image > on affiche ce champe uniquement en mode Création
            
            if($builder->getData()->getId() == false){
                // ajout du petit label a false pour qu'il ne s'affiche pas dans le formulaire
                $builder->add('pic', PicType::class, ['label'=>false]);
            }
                    //->add('authorName')
                    //->add('authorAvatarPath')
                    $builder->add('category')
                    ->add('colors', EntityType::class, [
                        'class' => 'Lddt\MainBundle\Entity\Color',
                        'choice_label' => 'name',
                        'multiple' => true,
                        'expanded' => true
                    ]);
        }
        /**
         * {@inheritdoc}
         */
        public function configureOptions(OptionsResolver $resolver){
            $resolver->setDefaults(array('data_class' => 'Lddt\MainBundle\Entity\Draw'));
        }
        /**
         * {@inheritdoc}
         */
        public function getBlockPrefix(){
            return 'lddt_mainbundle_draw';
        }
    }
