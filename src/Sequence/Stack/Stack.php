<?php

namespace Chetkov\DataStructures\Sequence\Stack;

use Chetkov\DataStructures\Sequence\AbstractSequence;

/**
 * Class Stack
 * @package Chetkov\DataStructures\Sequence\Stack
 */
class Stack extends AbstractSequence
{
    /**
     * @param $element
     * @return Stack
     */
    public function push($element): Stack
    {
        return $this->put($element);;
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        if ($this->isEmpty()) {
            throw new StackIsEmptyException('Stack is empty');
        }
        return array_pop($this->storage);
    }
}
