<?php

namespace Prism\PollBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * OpinionType
 */
class OpinionType extends AbstractType
{
    /**
     * Build Form
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name')
                ->add('points');
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'opinion';
    }

    /**
     * Set Default Options
     *
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Prism\PollBundle\Entity\Opinion',
        ));
    }
}