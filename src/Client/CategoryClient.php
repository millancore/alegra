<?php

namespace Alegra\Client;

use Alegra\Entity\Category;
use Alegra\Entity\EntityFactory;
use Alegra\Message\Request;
use Alegra\Validation\Validator;

class CategoryClient extends Client
{
    /**
     * Get a Category by id
     *
     * @param integer $id
     * @return Category
     */
    public function get(int $id)
    {
        $response = $this->carrier->send(
            Request::get('categories/')
                   ->addAuth($this->auth)
                   ->addJsonHeaders()
        );

        return EntityFactory::fromJson($response->getBody(), Category::class);
    }


    /**
     * Get Category list
     *
     * @param array $options
     * @return Collection
     */
    public function all(array $options = [])
    {
        $validator = new Validator($options, [
            'format' => ['type' => 'string', 'default' => 'tree', 'allow' => ['plain', 'tree']],
            'type' => ['type' => 'string', 'allow' => [ 'income', 'expense', 'equity', 'asset', 'liability']],
            'categoryRule_key' => ['type' => 'string']
        ]);

        $response = $this->carrier->send(
            Request::get('categories/')
                   ->addQueryParams($validator->validate())
                   ->addAuth($this->auth)
                   ->addJsonHeaders()
        );

        return EntityFactory::fromJson($response->getBody(), Category::class, true);
    }
}