<?php

namespace Tests\Chetkov\DataStructures\Graph\Walker;

use Chetkov\DataStructures\Graph\Graph;

/**
 * Trait GraphBuilderTrait
 * @package Tests\Chetkov\DataStructures\Graph\Walker
 */
trait GraphBuilderTrait
{
    /**
     * @return Graph
     */
    public function buildGraph(): Graph
    {
        $graph = new Graph();

        $size = 3;
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $currentNode = "$i$j";

                $rightLinkedNode = $j + 1 < $size ? $i . ($j + 1) : null;
                if ($rightLinkedNode) {
                    $graph->addNodesLink($currentNode, $rightLinkedNode);
                }

                $bottomLinkedNode = $i + 1 < $size ? ($i + 1) . $j : null;
                if ($bottomLinkedNode) {
                    $graph->addNodesLink($currentNode, $bottomLinkedNode);
                }
            }
        }
        return $graph;
    }
}
