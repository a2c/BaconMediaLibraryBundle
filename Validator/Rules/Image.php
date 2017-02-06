<?php

namespace Bacon\Bundle\MediaLibraryBundle\Validator\Rules;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class Image
 * @package Bacon\Bundle\MediaLibraryBundle\Validator\Rules
 *
 * @author Adan Felipe Medeiros <adan.grg@gmail.com>
 * @version 1.0
 */
class Image implements RuleInterface
{

    private $extensionValidate = [
        'png',
        'jpg',
        'jpeg',
        'gif',
        'bmp'
    ];

    /**
     * @param UploadedFile $input
     */
    public function validate($input)
    {
        $extension = explode('.',$input);

        if (in_array($extension[1], $this->extensionValidate)) {
            return true;
        }

        return false;
    }
}