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
        $view->vars['is_image'] = $options['is_image'];
        if ($form->getData() instanceof MediaLibraryInterface) {
            $view->vars['value_hidden'] = $form->getData()->getId();

            if ($form->getData()->isImage())
                $view->vars['image'] = $form->getData()->getName();
            else
                $view->vars['file']  = $form->getData()->getName();

            $view->vars['name_original']  = $form->getData()->getOriginalName();
        }

        parent::buildView($view, $form, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Bacon\Bundle\MediaLibraryBundle\Entity\MediaLibrary',
            'is_image'   => true,
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
