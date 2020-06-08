<?php

namespace Alegra\Client;

use Alegra\Entity\EntityFactory;
use Alegra\Entity\PriceList;
use Alegra\Message\Request;
use Alegra\Validation\Validator;

class PriceListClient extends Client
{   

    /**
     * Get PriceList by Id
     *
     * @param integer $id
     * @return PriceList
     */
    public function get(int $id)
    {
        $response = $this->carrier->send(
            Request::get('price-lists/'.$id)
                    ->addAuth($this->auth)
                    ->addJsonHeaders()
        );

        return EntityFactory::fromJson($response->getBody(), PriceList::class);
    }

    /**
     * Get PriceList list
     *
     * @param array $options
     * @return Collection
     */
    public function all(array $options = [])
    {
        $validator = new Validator($options, [
            'query' => ['type' => 'string']
        ]);

        $response = $this->carrier->send(
            Request::get('price-lists/')
                   ->addQueryParams($validator->validate())
                   ->addAuth($this->auth)
                   ->addJsonHeaders()
        );

        return EntityFactory::fromJson($response->getBody(), PriceList::class, true);
    }
    
}