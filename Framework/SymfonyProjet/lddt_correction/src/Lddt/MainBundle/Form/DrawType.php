<?php

namespace Lddt\MainBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DrawType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,
                ['label'=>'Nom du dessin','attr'=>['class'=>'form-control']]);
//            ->add('drawPath')

     // Formulaire imbriqué > permet de télécharger une image > On affiche ce champ uniquement en mode création
        if($builder->getData()->getId() == false) {
            $builder->add("pic",PicType::class,['label'=>false]);
        }
//            ->add('isOnline')
//        ->add('authorName')
//            ->add('authorAvatarPath')
//            ->add('createdAt')
//            ->add('updatedAt')
    $builder->add('category')
            ->add('colors',EntityType::class,array(
                'label'=>"Associez vos couleurs",
                'class'=>'Lddt\MainBundle\Entity\Color',
                'choice_label'=>'name',
                'multiple'=>true,
                'expanded'=>true))

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lddt\MainBundle\Entity\Draw'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lddt_mainbundle_draw';
    }


}
