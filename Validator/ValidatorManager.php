<?php

namespace Bacon\Bundle\MediaLibraryBundle\Validator;

use Bacon\Bundle\MediaLibraryBundle\Validator\Rules\RuleInterface;

/**
 * Class ValidatorManager
 * @package Bacon\Bundle\MediaLibraryBundle\Validator
 * @author Adan Felipe Medeiros <adan.grg@gmail.com>
 * @version 1.0
 */
class ValidatorManager implements ValidatorInterface
{
    /**
     * @var RuleInterface
     */
    protected $rule;

    /**
     * @var array|string
     */
    protected $data;

    /**
     * Validator constructor.
     */
    public function __construct(RuleInterface $rule)
    {
        $this->rule = $rule;
    }

    /**
     * @param $input
     * @return bool
     */
    public function isValid()
    {
        return $this->rule->validate($this->getData());
    }

    /**
     * @return array|string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array|string $data
     * @return ValidatorManager
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
