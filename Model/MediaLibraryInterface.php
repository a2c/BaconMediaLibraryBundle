<?php

namespace Bacon\Bundle\MediaLibraryBundle\Model;

/**
 * Interface MediaLibraryInterface
 * @package Bacon\Bundle\MediaLibraryBundle\Model
 * @author Adan Felipe Medeiros <adan.grg@gmail.com>
 * @version 1.0
 */
interface MediaLibraryInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param mixed $id
     * @return MediaLibrary
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getOriginalName();

    /**
     * @param mixed $originalName
     * @return MediaLibrary
     */
    public function setOriginalName($originalName);

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param mixed $name
     * @return MediaLibrary
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getUploadAt();

    /**
     * @param mixed $uploadAt
     * @return MediaLibrary
     */
    public function setUploadAt($uploadAt);

    /**
     * @return mixed
     */
    public function getLink();

    /**
     * @param mixed $link
     * @return MediaLibrary
     */
    public function setLink($link);
}