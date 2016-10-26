<?php

namespace Prism\PollBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

/**
 * PollType
 */
class PollType extends AbstractType
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
            ->add('published')
            ->add('closed')
            ->add('opinions', CollectionType::class, array(
                'entry_type' => $options['opinion_form'],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false
            ));
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'poll';
    }

    /**
     * Set Default Options
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'opinion_form' => 'Prism\PollBundle\Form\OpinionType',
            'constraints' => new \Symfony\Component\Validator\Constraints\Valid(),
        ));
    }
}
