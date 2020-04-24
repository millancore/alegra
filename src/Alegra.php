<?php

namespace Alegra;

use Alegra\Client\Client;
use Alegra\Contract\{CarrierInterface, HttpClientInterface, ListenerInterface};
use Alegra\Event\{EventManager, LogListener};
use Alegra\Exception\AlegraException;
use Alegra\Http\{HttpClient, RestCarrier};
use Psr\Log\LoggerInterface;

class Alegra
{
    private $config;
    private $carrier;
    private $eventManager;

    /** Self instance */
    protected static $instance;

    /** Register gateways */
    private $clients = [];

    /**
     * Prevents the creation of Alegra 
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
        if (static::$instance) {
            throw new AlegraException(
                'There is already an instance of Alegra, use "Alegra::getInstance()"'
            );
         }

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
     * Get Gateway client
     *
     * @param string $clientClassName
     * @return void
     */
    public function getClient(string $clientClassName)
    {
        if (!array_key_exists($clientClassName, $this->clients)) {
            return false;
        }

        return $this->clients[$clientClassName];
    }


    /**
     * Register Geteway client,
     * this prevent to create new client instance by Facade
     * instead use registered client.
     *
     * @param string $clientClassName
     * @param Client $client
     * @return void
     */
    public function registerClient(string $clientClassName, Client $client)
    {
        $this->clients[$clientClassName] = $client;
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


    /**
     * Set PSR Logger
     *
     * @param LoggerInterface $logger
     * @return void
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->eventManager->addListener(new LogListener($logger));
    }

    /**
     * Add Listener to EventManager
     *
     * @param ListenerInterface $listener
     * @return void
     */
    public function addListener(ListenerInterface $listener)
    {
        $this->eventManager->addListener($listener);
    }

    /**
     * Destroy Alegra :(
     *
     * @return void
     */
    public static function destroy()
    {
        self::$instance = null;
    }

}

