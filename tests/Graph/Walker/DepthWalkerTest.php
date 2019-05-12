<?php

namespace Tests\Chetkov\DataStructures\Graph\Walker;

use Chetkov\DataStructures\Graph\Walker\DepthWalker;
use PHPUnit\Framework\TestCase;

/**
 * Class DepthWalkerTest
 * @package Tests\Chetkov\DataStructures\Graph\Walker
 */
class DepthWalkerTest extends TestCase
{
    use GraphBuilderTrait;

    /**
     * @covers \Chetkov\DataStructures\Graph\Walker\DepthWalker::walk
     * @uses \Chetkov\DataStructures\Graph\Graph
     * @uses \Chetkov\DataStructures\Graph\Walker\AbstractWalker
     * @uses \Chetkov\DataStructures\Sequence\AbstractSequence
     * @uses \Chetkov\DataStructures\Sequence\Stack\Stack
     */
    public function testWalk(): void
    {
        $walker = new DepthWalker($this->buildGraph());
        $path = $walker->walk('00');
        $this->assertEquals('00-10-20-21-22-12-02-11-01', implode('-', $path));
    }
}
