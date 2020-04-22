<?php

namespace Alegra\Contract;

use Countable;
use ArrayAccess;
use IteratorAggregate;

interface CollectionInterface extends ArrayableInterface, Countable, ArrayAccess, IteratorAggregate
{

}