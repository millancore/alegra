<?php

namespace Alegra;

use Alegra\Contract\CarrierInterface;
use Alegra\Contract\HttpClientInterface;
use Alegra\Exception\AlegraException;
use Alegra\Http\HttpClient;
use Alegra\Http\RestCarrier;
use Laminas\EventManager\EventManager;

class Alegra
{
    private $config;
    private $carrier;
    private $eventManager;

    protected static $instance; 

    /**
     * prevents the creation of Alegra 
     */
    private function __construct(array $options)
    {
        $this->init($options);
        self::$instance = $this;
    }
    
    /**
     * Singleton Alegra SDK
     *
     * @return void
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
           throw new AlegraException('You must configure Alegra::setCredentials');
        }

        return static::$instance;
    }

    /**
     * Set credentials 
     *
     * @param array $config
     * @return void
     */
    public static function setCredentials(array $options)
    {
        return new static($options);
    }


    /**
     * Start Alegra Carrier
     *
     * @param array $options
     * @return void
     */
    private function init(array $options)
    {
        $this->config = new Config($options);
        $this->eventManager = new EventManager;

        $this->carrier = new RestCarrier(
            new HttpClient($this->config),
            $this->eventManager
        );
    }

    /**
     * Get Carrier
     *
     * @return CarrierInterface
     */
    public function getCarrier() : CarrierInterface
    {
        return $this->carrier;
    }


    /**
     * Get Config
     *
     * @return Config
     */
    public function getConfig() : Config
    {
        return $this->config;
    }


    /**
     * Set HttpClient
     *
     * @param HttpClientInterface $client
     * @return void
     */
    public function setClient(HttpClientInterface $client)
    {
        $this->carrier = new RestCarrier($client, $this->eventManager);
    }

}

