<?php

use Alegra\Support\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    private $collection;

    public function setUp() : void
    {
        $this->collection = new Collection([
            'key' => 'value',
            'otherKey' => 'otherValue'
        ]);
    }

    public function testCountCollectionElements()
    {
        $this->assertEquals(2, $this->collection->count());
    }

    public function testAddNewElementToCollection()
    {
        $this->collection->add('newElement');

        $this->assertEquals(3, $this->collection->count());
        $this->assertEquals($this->collection[0], 'newElement');
    }

    public function testExistElementByKey()
    {
        $this->assertTrue(isset($this->collection['key']));
    }

    public function testSetContentByKey()
    {
        $this->collection['otherKey'] = 'newValue';

        $this->assertEquals('newValue', $this->collection['otherKey']);
    }

    public function testSetContentWithoutKey()
    {
        $this->collection[] = 'newValue';

        $this->assertEquals('newValue', $this->collection[0]);
    }

    public function testGetContentByKey()
    {
        $this->assertEquals('value', $this->collection['key']);
    }

    public function testIsArrayable()
    {
        $expectedArray = [
            'key' => 'value',
            'otherKey' => 'otherValue',
        ];

        $this->assertEquals($expectedArray, $this->collection->toArray());
    }

    public function testIsIterable()
    {
        $this->assertIsIterable($this->collection);
    }

    public function testDeleteItemByKey()
    {
        unset($this->collection['key']);

        $this->assertEquals(1, $this->collection->count());
    }
}