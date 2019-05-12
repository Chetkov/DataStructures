<?php

namespace Tests\Chetkov\DataStructures\Graph;

use Chetkov\DataStructures\Graph\Graph;
use PHPUnit\Framework\TestCase;

/**
 * Class GraphTest
 * @package Tests\Chetkov\DataStructures\Graph
 * @coversDefaultClass \Chetkov\DataStructures\Graph\Graph
 */
class GraphTest extends TestCase
{
    /**
     * @covers ::addNode
     * @covers ::getNodes
     */
    public function testAddNodeAndGetNodes(): void
    {
        $graph = new Graph();

        $nodes = ['A', 'B', 'C'];
        foreach ($nodes as $node) {
            $graph->addNode($node);
        }

        foreach ($graph->getNodes() as $node) {
            if (!in_array($node, $nodes)) {
                throw new \RuntimeException("Method Graph::getNodes returned an incorrect node $node");
            }
        }

        $this->assertTrue(true);
    }

    /**
     * @covers ::addNodesLink
     * @covers ::getLinkedNodes
     * @uses \Chetkov\DataStructures\Graph\Graph::addNode()
     */
    public function testAddNodesLinkAndGetLinkedNodes(): void
    {
        $graph = new Graph();

        $graph->addNodesLink('A', 'B', 12.0, false);
        foreach ($graph->getLinkedNodes('A') as $linkedNode => $weight) {
            if ($linkedNode !== 'B' || $weight !== 12.0) {
                throw new \RuntimeException('Linked node must be B. and weight must be 12.0');
            }
        }

        $graph->addNodesLink('B', 'A', 10.0, false);
        foreach ($graph->getLinkedNodes('B') as $linkedNode => $weight) {
            if ($linkedNode !== 'A' || $weight !== 10.0) {
                throw new \RuntimeException('Linked node must be A, and weight must be 10.0');
            }
        }

        $graph->addNodesLink('C', 'D');
        foreach ($graph->getLinkedNodes('C') as $linkedNode => $weight) {
            if ($linkedNode !== 'D' || $weight !== 1.0) {
                throw new \RuntimeException('Linked node must be D, and weight must be 1.0');
            }
        }

        foreach ($graph->getLinkedNodes('D') as $linkedNode => $weight) {
            if ($linkedNode !== 'C' || $weight !== 1.0) {
                throw new \RuntimeException('Linked node must be C, and weight must be 1.0');
            }
        }

        $this->assertTrue(true);
    }
}
