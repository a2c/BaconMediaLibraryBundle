<?php

namespace Bacon\Bundle\MediaLibraryBundle\Utils;

use Bacon\Bundle\MediaLibraryBundle\Entity\MediaLibrary;
use Doctrine\ORM\Mapping as ORM;

trait ImageField
{
    /**
     * @var MediaLibrary
     *
     * @ORM\ManyToOne(targetEntity="Bacon\Bundle\MediaLibraryBundle\Entity\MediaLibrary")
     * @ORM\JoinColumn(name="media_library_id", referencedColumnName="id", nullable=false)
     */
    private $media;

    /**
     * @return MediaLibrary
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param MediaLibrary $media
     * @return ImageField
     */
    public function setMedia($media)
    {
        $this->media = $media;
        return $this;
    }
}