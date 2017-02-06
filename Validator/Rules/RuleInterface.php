<?php

namespace Bacon\Bundle\MediaLibraryBundle\Validator\Rules;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface RuleInterface
{
    /**
     * @param string|UploadedFile|array $input
     * @return boolean
     */
    public function validate($input);
}