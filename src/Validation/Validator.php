<?php

namespace Alegra\Validation;

use Alegra\Contract\ValidationInterface;
use Alegra\Exception\ValidationException;
use Symfony\Component\OptionsResolver\Exception\InvalidArgumentException;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Validator implements ValidationInterface
{
    /** @var OptionsResolver */
    private $resolver;
    private $options;

    public function __construct(array $options = [], array $rules = [])
    {
        $this->resolver = new OptionsResolver();
        $this->options = $options;

        $this->setDefined(array_keys($rules));

        foreach ($rules as $key => $value) {
            $this->setAllowedTypes($key, $value);
            $this->setAllowedValues($key, $value);
            $this->setDefault($key, $value);
        }
    }

    /**
     * Define valid name options
     *
     * @param array $defined
     * @return void
     */
    private function setDefined(array $defined)
    {
        $this->resolver->setDefined($defined);
    }


    /**
     * Set default value
     *
     * @param string $field
     * @param mix $value
     * @return void
     */
    private function setDefault(string $field, $value)
    {
        if (!isset($value['default'])) {
            return;
        }
        
        $this->resolver->setDefault($field, $value['default']);
    }

    /**
     * Add valid types
     *
     * @param string $field
     * @param string $value
     * @return void
     */
    private function setAllowedTypes(string $field, $value)
    {
        if (!isset($value['type'])) {
            return;
        }

        $this->resolver->setAllowedTypes($field, $value['type']);
    }

    /**
     * Add valid values
     *
     * @param string $field
     * @param array $value
     * @return void
     */
    private function setAllowedValues(string $field, $value)
    {
        if (!isset($value['allow'])) {
            return;
        }

        $this->resolver->setAllowedValues($field, $value['allow']);

    }


    /**
     * Validate options
     *
     * @return array
     */
    public function validate()
    {
        try {
            return $this->resolver->resolve($this->options);
        } catch (InvalidArgumentException $th) {
            throw new ValidationException($th->getMessage());
        }

    }
}