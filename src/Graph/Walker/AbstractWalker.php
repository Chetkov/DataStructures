<?php

namespace Chetkov\DataStructures\Graph\Walker;

use Chetkov\DataStructures\Graph\Graph;

/**
 * Class AbstractWalker
 * @package Chetkov\DataStructures\Graph
 */
abstract class AbstractWalker
{
    /** @var Graph */
    protected $graph;

    /**
     * AbstractWalker constructor.
     * @param Graph $graph
     */
    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }

    /**
     * @param Graph $graph
     * @return static
     */
    public function setGraph(Graph $graph)
    {
        $this->graph = $graph;
        return $this;
    }

    /**
     * @param string $node
     * @return array
     */
    abstract public function walk(string $node): array;
}
