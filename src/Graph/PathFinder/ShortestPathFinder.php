<?php

namespace Chetkov\DataStructures\Graph\PathFinder;

use Chetkov\DataStructures\Graph\Graph;

/**
 * Class ShortestPathFinder
 * @package Chetkov\DataStructures\Graph\PathFinder
 */
class ShortestPathFinder
{
    /** @var array */
    private $usedNodes = [];

    /** @var array */
    private $weightSum = [];

    /** @var array */
    private $path = [];

    /** @var Graph */
    private $graph;

    /**
     * Dijkstra constructor.
     * @param Graph $graph
     */
    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }

    /**
     * @param string $aNode
     * @param string $bNode
     * @return array
     */
    public function findShortestPath(string $aNode, string $bNode): array
    {
        $this->init();
        $this->weightSum[$aNode] = 0;
        while ($nearestNode = $this->getNearestUnusedNode()) {
            $this->setWeightSumToLinkedNodes($nearestNode);
        }
        return $this->restorePath($aNode, $bNode);
    }

    private function init(): void
    {
        foreach ($this->graph->getNodes() as $node) {
            $this->usedNodes[$node] = false;
            $this->weightSum[$node] = INF;
            $this->path[$node] = false;
        }
    }

    /**
     * @return string|null
     */
    private function getNearestUnusedNode(): ?string
    {
        $nearestNode = null;
        foreach ($this->graph->getNodes() as $node) {
            if (!$this->usedNodes[$node]
                && (!$nearestNode
                    || $this->weightSum[$node] < $this->weightSum[$nearestNode])
            ) {
                $nearestNode = $node;
            }
        }
        return $nearestNode;
    }

    /**
     * @param string $node
     */
    private function setWeightSumToLinkedNodes(string $node): void
    {
        $this->usedNodes[$node] = true;
        foreach ($this->graph->getLinkedNodes($node) as $linkedNode => $weight) {
            if (!$this->usedNodes[$linkedNode]) {
                $newWeightSum = $this->weightSum[$node] + $weight;
                if ($newWeightSum < $this->weightSum[$linkedNode]) {
                    $this->weightSum[$linkedNode] = $newWeightSum;
                    $this->path[$linkedNode] = $node;
                }
            }
        }
    }

    /**
     * @param string $aNode
     * @param string $bNode
     * @return array
     */
    private function restorePath(string $aNode, string $bNode): array
    {
        $path = [$bNode];
        while ($bNode !== $aNode) {
            $bNode = $this->path[$bNode];
            $path[] = $bNode;
        }
        return array_reverse($path);
    }
}
