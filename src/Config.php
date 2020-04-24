<?php

namespace Alegra;

use Alegra\Exception\ConfigException;
use Symfony\Component\OptionsResolver\Exception\InvalidArgumentException;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Config
{
    private $options;

    public function __construct(array $options = [])
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);
        
        try {
            $this->options = $resolver->resolve($options);
        } catch (InvalidArgumentException $th) {
            throw new ConfigException($th->getMessage());
        }
    }

    private function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined('logger', 'timeout');
        $resolver->setRequired(['email', 'token']);

        $resolver->setDefaults([
            'api' => 'https://api.alegra.com/api/v1/',
            'timeout' => '10'
        ]);

        $resolver->setAllowedValues('email', function($value){
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        });
    }


    public function __get($name)
    {
        if (isset($this->options[$name])) {
            return $this->options[$name];
        }

        return null;
    }

}