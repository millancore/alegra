<?php

namespace Alegra\Client;

use Alegra\Entity\BaseItem;
use Alegra\Entity\EntityFactory;
use Alegra\Message\Request;

class ItemsClient extends Client
{

    /**
     * Get Item by ID
     *
     * @param integer $id
     * @return void
     */
    public function get(int $id)
    {
        $response = $this->carrier->send(
            Request::get('/items/'.$id)
                    ->addAuth($this->auth)
                    ->addJsonHeaders()
        );

        return EntityFactory::fromJson($response->getBody(), BaseItem::class);
    }

    /**
     * Get Items Lists
     *
     * @param array $options
     * @return void
     */
    public function getList(array $options)
    {

    }

    /**
     * Persist Item
     *
     * @param BaseItem $item
     * @return void
     */
    public function save(BaseItem $item)
    {

    }


    /**
     * Update Item 
     *
     * @param BaseItem $item
     * @return void
     */
    public function update(BaseItem $item)
    {

    }

    
    /**
     * Delete Item
     *
     * @param integer|BaseItem $id|$Item
     * @return void
     */
    public function delete($item)
    {

    }


    /**
     * Attach File to Item
     *
     * @param Resource $resource
     * @return void
     */
    public function attach(int $id, Resource $resource)
    {

    }
}