<?php

namespace Alegra\Support\Facade;

use Alegra\Alegra;

abstract class Facade 
{
    /**
     * Return name Client
     *
     * @return string
     */
    abstract static function getClient() : string;

    /**
     * Resolve Client Instance
     *
     * @return void
     */
    public static function resolveClient()
    {
        $classClient = static::getClient();
        return new $classClient(Alegra::getInstance()->getCarrier());
    }

     /**
     * Handle dynamic
     *
     * @param  string  $method
     * @param  array   $args
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $client = static::resolveClient();

        return $client->$method(...$args);
    }

}