<?php

namespace Alegra\Support\Facade;

use Alegra\Alegra;
use Alegra\Auth\Authentication;

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
        $clientClassName = static::getClient();
        
        /** @var Alegra */
        $alegra = Alegra::getInstance();

        if ($alegra->getClient($clientClassName)) {
            return $alegra->getClient($clientClassName);
        }

        $client = new $clientClassName(
            $alegra->getCarrier(),
            new Authentication(
                $alegra->getConfig()->email,
                $alegra->getConfig()->token
            )
        );

        $alegra->registerClient($clientClassName, $client);

        return $client;
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