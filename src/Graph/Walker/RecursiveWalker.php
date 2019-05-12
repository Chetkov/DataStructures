<?php

namespace Chetkov\DataStructures\Graph\Walker;

/**
 * Class RecursiveWalker
 * @package Chetkov\DataStructures\Graph
 */
class RecursiveWalker extends AbstractWalker
{
    /** @var array */
    private $path = [];

    /**
     * @param string $node
     * @return array
     */
    public function walk(string $node): array
    {
        $this->path[$node] = true;
        foreach ($this->graph->getLinkedNodes($node) as $linkedNode => $weight) {
            if (!isset($this->path[$linkedNode])) {
                $this->walk($linkedNode);
            }
        }
        return array_keys($this->path);
    }
}
