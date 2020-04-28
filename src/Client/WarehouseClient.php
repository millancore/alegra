<?php

namespace Alegra\Client;

use Alegra\Entity\EntityFactory;
use Alegra\Entity\Warehouse;
use Alegra\Message\Request;

class WarehouseClient extends Client
{
    /**
     * Get a Warehouse by id
     *
     * @param integer $id
     * @return Warehouse
     */
    public function getById(int $id)
    {
        $response = $this->carrier->send(
            Request::get('/warehouses/'.$id)
                   ->addAuth($this->auth)
                   ->addJsonHeaders()
        );

        return EntityFactory::fromJson($response->getBody(), Warehouse::class);
    }


    /**
     * Get Warehouses list
     *
     * @param array $options
     * @return Collection
     */
    public function getList()
    {
        $response = $this->carrier->send(
            Request::get('/warehouses/')
                   ->addAuth($this->auth)
                   ->addJsonHeaders()
        );
        
        return EntityFactory::fromJson($response->getBody(), Warehouse::class, true);
    }
}