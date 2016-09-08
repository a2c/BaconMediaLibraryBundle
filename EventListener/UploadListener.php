<?php

namespace Bacon\Bundle\MediaLibraryBundle\EventListener;

use Bacon\Bundle\MediaLibraryBundle\Model\MediaLibraryInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Oneup\UploaderBundle\Event\PostPersistEvent;
use Symfony\Component\HttpFoundation\JsonResponse;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;

/**
 * Class UploadListener
 *
 * @package Bacon\Bundle\MediaLibraryBundle\EventListener
 *
 * @author Adan Felipe Medeiros <adan.grg@gmail.com>
 * @version 1.0
 */
class UploadListener
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @var MediaLibraryInterface
     */
    private $classEntity;

    /**
     * @var CacheManager
     */
    private $liipCacheManager;

    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * @param PostPersistEvent $event
     */
    public function onUpload(PostPersistEvent $event)
    {
        $request = $event->getRequest();
        $files = $request->files->all();
        if (isset($files['files'])) {

            /** @var \Symfony\Component\HttpFoundation\File\UploadedFile */
            $file = $files['files'];

            $this->classEntity->setName($event->getFile()->getName());
            $this->classEntity->setUploadAt(new \DateTime('now'));

            if (method_exists($file,'getClientOriginalName')) {
                $this->classEntity->setOriginalName($file->getClientOriginalName());
            }else{
              $this->classEntity->setOriginalName($event->getFile()->getName());
            }

            $this->om->persist($this->classEntity);
            $this->om->flush();
            if (method_exists($file,'getClientOriginalName')) {
                $response = $event->getResponse();
                $response['bacon_media_library'] = [
                    'id'    =>  $this->classEntity->getId(),
                    'src'   =>  $this->liipCacheManager->getBrowserPath($event->getFile()->getName(), 'thumb_from_original'),
                    'srcOriginal' => $this->liipCacheManager->getBrowserPath($event->getFile()->getName(), 'original'),
                    'name'  =>  $file->getClientOriginalName(),
                ];
            }
        }

    }

    /**
     * @return CacheManager
     */
    public function getLiipCacheManager()
    {
        return $this->liipCacheManager;
    }

    /**
     * @param CacheManager $liipCacheManager
     * @return UploadListener
     */
    public function setLiipCacheManager(CacheManager $liipCacheManager)
    {
        $this->liipCacheManager = $liipCacheManager;
        return $this;
    }

    /**
     * @param $classEntity
     * @return $this
     */
    public function setClassEntity($classEntity)
    {
        $objTemp = new $classEntity();

        if ($objTemp instanceof MediaLibraryInterface) {
            $this->classEntity = $objTemp;
            return $this;
        }

        throw new \InvalidArgumentException('A classe deve ser da instancia de MediaLibraryInterface');
    }
}
