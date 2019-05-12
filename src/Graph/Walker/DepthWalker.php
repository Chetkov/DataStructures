<?php

namespace Chetkov\DataStructures\Graph\Walker;

use Chetkov\DataStructures\Sequence\Stack\Stack;

/**
 * Class DepthWalker
 * @package Chetkov\DataStructures\Graph\Walker
 */
class DepthWalker extends AbstractWalker
{
    /**
     * @param string $node
     * @return array
     */
    public function walk(string $node): array
    {
        $stack = new Stack();
        $stack->push($node);

        $path = [];
        while (!$stack->isEmpty()) {
            $node1 = $stack->pop();
            $path[$node1] = true;
            foreach ($this->graph->getLinkedNodes($node1) as $linkedNode => $weight) {
                if (!isset($path[$linkedNode]) && !$stack->contains($linkedNode)) {
                    $stack->push($linkedNode);
                }
            }
        }

        return array_keys($path);
    }
}
