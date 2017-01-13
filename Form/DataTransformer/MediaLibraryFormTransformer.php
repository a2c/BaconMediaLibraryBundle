<?php

namespace Bacon\Bundle\MediaLibraryBundle\Form\DataTransformer;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;

class MediaLibraryFormTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * MediaLibraryFormTransformer constructor.
     * @param ObjectManager $manager
     */
    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function transform($value)
    {
        return $value;
    }

    public function reverseTransform($value)
    {
        if (null === $value)
            return;

        $mediaLibrary = $this->manager->getRepository('BaconMediaLibraryBundle:MediaLibrary')->find($value);

        return $mediaLibrary;

    }

}