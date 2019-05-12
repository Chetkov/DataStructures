<?php

namespace Chetkov\DataStructures\LinkedList;

/**
 * Class Node
 * @package Chetkov\DataStructures\LinkedList
 */
class Node
{
    /** @var mixed */
    private $value;

    /** @var Node|null */
    private $next;

    /**
     * Node constructor.
     * @param $value
     * @param Node|null $next
     */
    public function __construct($value, ?Node $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return Node|null
     */
    public function getNext(): ?Node
    {
        return $this->next;
    }

    /**
     * @param Node $next
     * @return Node
     */
    public function setNext(Node $next): Node
    {
        $this->next = $next;
        return $this;
    }
}
