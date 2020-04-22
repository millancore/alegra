<?php

namespace Alegra\Client;

use Alegra\Entity\BaseItem;
use Alegra\Message\ItemRequest;
use Alegra\Message\ItemResponse;

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
        $request = new ItemRequest($id, 'GET', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-type' => 'application/json',
                'Authorization' => 'Basic ZWplbXBsb2FwaUBhbGVncmEuY29tOnRva2VuZWplbXBsb2FwaTEyMzQ1'
            ]
        ]);

        $rawResponse = $this->carrier->send($request);

        $response = new ItemResponse(
            $rawResponse->getStatusCode(),
            $rawResponse->getHeaders(),
            (string) $rawResponse->getBody()
        );

        return $response->parse();
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