<?php

namespace Chetkov\DataStructures\Graph;

/**
 * Class Graph
 * @package Chetkov\DataStructures\Graph
 */
class Graph
{
    /**
     * @var array
     *
     * $matrix = [
     *     'node1' => [
     *         'node2' => '1' //Edge weight
     *         'node3' => '1' //Edge weight
     *     ],
     *     'node2' => [
     *         'node1' => '1' //Edge weight
     *         'node3' => '1' //Edge weight
     *     ],
     *     'node3' => [
     *         'node1' => '1' //Edge weight
     *         'node2' => '1' //Edge weight
     *     ],
     * ];
     */
    private $matrix = [];

    /**
     * @param string $node
     * @return Graph
     */
    public function addNode(string $node): Graph
    {
        if (!isset($this->matrix[$node])) {
            $this->matrix[$node] = [];
        }
        return $this;
    }

    /**
     * @param string $xNode
     * @param string $yNode
     * @param float $weight
     * @param bool $linkIsBidirectional
     * @return Graph
     */
    public function addNodesLink(string $xNode, string $yNode, float $weight = 1.0, bool $linkIsBidirectional = true): Graph
    {
        $this->addNode($xNode)->addNode($yNode);
        $this->matrix[$xNode][$yNode] = $weight;
        if ($linkIsBidirectional) {
            $this->matrix[$yNode][$xNode] = $weight;
        }
        return $this;
    }

    /**
     * @return string[]|iterable
     */
    public function getNodes(): iterable
    {
        foreach ($this->matrix as $node => $linkedNodes) {
            yield $node;
        }
    }

    /**
     * @param string $node
     * @return iterable : $linkedNode => $weight
     */
    public function getLinkedNodes(string $node): iterable
    {
        yield from $this->matrix[$node];
    }
}
