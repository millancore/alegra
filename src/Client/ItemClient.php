<?php

namespace Alegra\Client;

use Alegra\Entity\Item;
use Alegra\Entity\EntityFactory;
use Alegra\Message\Request;
use Alegra\Validation\Validator;

class ItemClient extends Client
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
            Request::get('items/' . $id)
                ->addAuth($this->auth)
                ->addJsonHeaders()
        );

        return EntityFactory::fromJson($response->getBody(), Item::class);
    }

    /**
     * Get Items Lists
     *
     * @param array $options
     * @return void
     */
    public function all(array $options = [])
    {
        $validator = new Validator($options, [
            'start' => ['type' => 'int', 'default' => 0],
            'limit' => ['type' => 'int', 'default' => 30],
            'order_direction' => [
                'type' => 'string',
                'default' => 'ASC',
                'allow' =>  ['ASC', 'DESC']
            ],
            'order_field' => ['type' => 'string'],
            'query' => ['type' => 'string'],
            'idWarehouse' => ['type' => 'int'],
        ]);

        $options = $validator->validate();

        $response = $this->carrier->send(
            Request::get('items/')
                ->addQueryParams($options)
                ->addAuth($this->auth)
                ->addJsonHeaders()
        );

        return EntityFactory::fromJson($response->getBody(), Item::class, true);
    }
    
}
