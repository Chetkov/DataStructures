<?php

namespace Tests\Chetkov\DataStructures\Graph\PathFinder;

use Chetkov\DataStructures\Graph\Graph;
use Chetkov\DataStructures\Graph\PathFinder\ShortestPathFinder;
use PHPUnit\Framework\TestCase;

/**
 * Class ShortestPathFinderTest
 * @package Tests\Chetkov\DataStructures\Graph\PathFinder
 * @coversDefaultClass \Chetkov\DataStructures\Graph\PathFinder\ShortestPathFinder
 */
class ShortestPathFinderTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::findShortestPath
     * @covers ::init
     * @covers ::getNearestUnusedNode
     * @covers ::setWeightSumToLinkedNodes
     * @covers ::restorePath
     * @uses \Chetkov\DataStructures\Graph\Graph

     */
    public function testFindShortestPath(): void
    {
        $graph = new Graph();

        $graph->addNodesLink('A', 'B', 11);
        $graph->addNodesLink('A', 'D', 8);
        $graph->addNodesLink('A', 'C', 15);

        $graph->addNodesLink('B', 'E', 8);

        $graph->addNodesLink('D', 'E', 11);
        $graph->addNodesLink('D', 'C', 1);

        $graph->addNodesLink('C', 'F', 6);

        $graph->addNodesLink('E', 'G', 1);
        $graph->addNodesLink('E', 'F', 3);

        $graph->addNodesLink('F', 'G', 5);

        $pathFinder = new ShortestPathFinder($graph);
        $path = $pathFinder->findShortestPath('A', 'G');
        $this->assertEquals('A-D-C-F-E-G', implode('-', $path));
    }
}
