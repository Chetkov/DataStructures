<?php

namespace Tests\Chetkov\DataStructures\Sequence\Stack;

use Chetkov\DataStructures\Sequence\Stack\Stack;
use Chetkov\DataStructures\Sequence\Stack\StackIsEmptyException;
use PHPUnit\Framework\TestCase;

/**
 * Class StackTest
 * @package Tests\Chetkov\DataStructures\Sequence\Stack
 * @coversDefaultClass \Chetkov\DataStructures\Sequence\Stack\Stack
 */
class StackTest extends TestCase
{
    /**
     * @covers ::push
     * @covers ::pop
     * @covers \Chetkov\DataStructures\Sequence\AbstractSequence::put
     * @uses \Chetkov\DataStructures\Sequence\Stack\Stack::isEmpty()
     */
    public function testPushAndPop(): void
    {
        $stack = new Stack();

        $stack
            ->push('1')
            ->push('2')
            ->push('3')
            ->push('4')
            ->push('5');

        $result = implode('', [
            $stack->pop(),
            $stack->pop(),
            $stack->pop(),
            $stack->pop(),
            $stack->pop(),
        ]);

        $this->assertEquals('54321', $result);
    }

    /**
     * @covers ::pop
     * @uses \Chetkov\DataStructures\Sequence\Stack\Stack::isEmpty()
     */
    public function testPopFromEmptyStack(): void
    {
        $stack = new Stack();

        $this->expectException(StackIsEmptyException::class);
        $stack->pop();
    }

    /**
     * @covers ::isEmpty
     * @uses \Chetkov\DataStructures\Sequence\Stack\Stack::push()
     * @uses \Chetkov\DataStructures\Sequence\AbstractSequence
     */
    public function testIsEmpty(): void
    {
        $stack = new Stack();
        $this->assertTrue($stack->isEmpty());

        $stack->push('1');
        $this->assertFalse($stack->isEmpty());
    }
}
