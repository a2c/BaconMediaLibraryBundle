<?php

namespace Bacon\Bundle\MediaLibraryBundle\Repository;

use Doctrine\ORM\EntityRepository;

class MediaLibraryRepository extends EntityRepository
{
    /**
     * @author Adan Felipe Medeiros <adan.grg@gmail.com>
     * @version 1.0
     */
    public function getPagination()
    {
        $queryBuilder = $this->createQueryBuilder('ml');

        return $queryBuilder->getQuery();
    }
}