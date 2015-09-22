<?php

namespace Itech\FormulaireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuestionnaireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
                
            ->add('categories', 'collection', array(
                'type' => new CategorieType(),
                'allow_add' => true,
                'by_reference' => false,
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Itech\FormulaireBundle\Entity\Questionnaire'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'itech_formulairebundle_questionnaire';
    }
}
