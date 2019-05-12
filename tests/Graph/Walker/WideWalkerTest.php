<?php

namespace Tests\Chetkov\DataStructures\Graph\Walker;

use Chetkov\DataStructures\Graph\Walker\WideWalker;
use PHPUnit\Framework\TestCase;

/**
 * Class WideWalkerTest
 * @package Tests\Chetkov\DataStructures\Graph\Walker
 */
class WideWalkerTest extends TestCase
{
    use GraphBuilderTrait;

    /**
     * @covers \Chetkov\DataStructures\Graph\Walker\WideWalker::walk
     * @uses \Chetkov\DataStructures\Graph\Graph
     * @uses \Chetkov\DataStructures\Graph\Walker\AbstractWalker
     * @uses \Chetkov\DataStructures\Sequence\AbstractSequence
     * @uses \Chetkov\DataStructures\Sequence\Queue\Queue
     */
    public function testWalk(): void
    {
        $walker = new WideWalker($this->buildGraph());
        $path = $walker->walk('00');
        $this->assertEquals('00-01-10-02-11-20-12-21-22', implode('-', $path));
    }
}
