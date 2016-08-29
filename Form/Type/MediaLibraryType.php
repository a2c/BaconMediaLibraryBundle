<?php

namespace Bacon\Bundle\MediaLibraryBundle\Form\Type;

use Bacon\Bundle\MediaLibraryBundle\Model\MediaLibraryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class MediaLibraryTypeExtension
 * @package Bacon\Bundle\MediaLibraryBundle\Form\Extension
 * @author Adan Felipe Medeiros <adan.grg@gmail.com>
 * @version 1.0
 */
class MediaLibraryType extends AbstractType
{
    /**
     * @var DataTransformerInterface
     */
    private $dataTransformer;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer($this->dataTransformer);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if ($form->getData() instanceof MediaLibraryInterface) {
            $view->vars['value_hidden'] = $form->getData()->getId();
            $view->vars['image'] = $form->getData()->getName();
        }

        parent::buildView($view, $form, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Bacon\Bundle\MediaLibraryBundle\Entity\MediaLibrary',
        ]);
    }

    public function getBlockPrefix()
    {
        return 'media_library';
    }

    public function getParent()
    {
        return HiddenType::class;
    }

    /**
     * @param DataTransformerInterface $dataTransformer
     */
    public function setModelTransformer(DataTransformerInterface $dataTransformer)
    {
        $this->dataTransformer = $dataTransformer;
    }
}
