<?php

namespace Chetkov\DataStructures\Sequence\Queue;

use Chetkov\DataStructures\Sequence\AbstractSequence;

/**
 * Class Queue
 * @package Chetkov\DataStructures\Sequence\Queue
 */
class Queue extends AbstractSequence
{
    /**
     * @param $element
     * @return Queue
     */
    public function enqueue($element): Queue
    {
        return $this->put($element);
    }

    /**
     * @return mixed
     */
    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new QueueIsEmptyException('Queue is empty');
        }
        return array_shift($this->storage);
    }
}
