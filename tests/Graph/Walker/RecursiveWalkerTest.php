<?php

namespace Tests\Chetkov\DataStructures\Graph\Walker;

use Chetkov\DataStructures\Graph\Graph;
use Chetkov\DataStructures\Graph\Walker\RecursiveWalker;
use PHPUnit\Framework\TestCase;

/**
 * Class RecursiveWalkerTest
 * @package Tests\Chetkov\DataStructures\Graph\Walker
 * @coversDefaultClass \Chetkov\DataStructures\Graph\Walker\RecursiveWalker
 */
class RecursiveWalkerTest extends TestCase
{
    use GraphBuilderTrait;

    /**
     * @covers ::walk
     * @covers \Chetkov\DataStructures\Graph\Walker\AbstractWalker::__construct
     * @covers \Chetkov\DataStructures\Graph\Walker\AbstractWalker::setGraph
     * @uses \Chetkov\DataStructures\Graph\Graph
     */
    public function testWalk(): void
    {
        //тест конструктора
        $walker = new RecursiveWalker(new Graph());

        //тест сеттера
        $walker->setGraph($this->buildGraph());

        $path = $walker->walk('00');
        $this->assertEquals('00-01-02-12-11-10-20-21-22', implode('-', $path));
    }
}
