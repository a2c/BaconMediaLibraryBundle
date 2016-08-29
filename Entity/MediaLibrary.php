<?php

namespace Bacon\Bundle\MediaLibraryBundle\Entity;

use Bacon\Bundle\MediaLibraryBundle\Model\MediaLibraryInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MediaLibrary
 * @package Bacon\Bundle\MediaLibraryBundle\Entitye
 * @ORM\Entity(repositoryClass="Bacon\Bundle\MediaLibraryBundle\Repository\MediaLibraryRepository")
 * @ORM\Table(name="media_library")
 */
class MediaLibrary implements MediaLibraryInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="original_name", type="string", nullable=false)
     */
    private $originalName;

    /**
     * @ORM\Column(name="name",type="string", nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(name="upload_at",type="datetime", nullable=false)
     */
    private $uploadAt;

    /**
     * @ORM\Column(name="link", type="string", nullable=true)
     */
    private $link;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return MediaLibrary
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * @param mixed $originalName
     * @return MediaLibrary
     */
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return MediaLibrary
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUploadAt()
    {
        return $this->uploadAt;
    }

    /**
     * @param mixed $uploadAt
     * @return MediaLibrary
     */
    public function setUploadAt($uploadAt)
    {
        $this->uploadAt = $uploadAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     * @return MediaLibrary
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    public function getImage()
    {
        if (is_null($this->link)) {
            return $this->getName();
        }

        return $this->link;
    }
}
