<?php

namespace Chetkov\DataStructures\Graph\Walker;

use Chetkov\DataStructures\Sequence\Queue\Queue;

/**
 * Class WideWalker
 * @package Chetkov\DataStructures\Graph\Walker
 */
class WideWalker extends AbstractWalker
{
    /**
     * @param string $node
     * @return array
     */
    public function walk(string $node): array
    {
        $queue = new Queue();
        $queue->enqueue($node);

        $path = [];
        while (!$queue->isEmpty()) {
            $node1 = $queue->dequeue();
            $path[$node1] = true;
            foreach ($this->graph->getLinkedNodes($node1) as $linkedNode => $weight) {
                if (!isset($path[$linkedNode]) && !$queue->contains($linkedNode)) {
                    $queue->enqueue($linkedNode);
                }
            }
        }

        return array_keys($path);
    }
}
