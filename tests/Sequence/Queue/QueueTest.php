<?php

namespace Tests\Chetkov\DataStructures\Sequence\Queue;

use Chetkov\DataStructures\Sequence\Queue\Queue;
use Chetkov\DataStructures\Sequence\Queue\QueueIsEmptyException;
use PHPUnit\Framework\TestCase;

/**
 * Class QueueTest
 * @package Tests\Chetkov\DataStructures\Sequence\Queue
 * @coversDefaultClass \Chetkov\DataStructures\Sequence\Queue\Queue
 */
class QueueTest extends TestCase
{
    /**
     * @covers ::enqueue
     * @covers ::dequeue
     * @covers \Chetkov\DataStructures\Sequence\AbstractSequence::put
     * @uses \Chetkov\DataStructures\Sequence\Queue\Queue::isEmpty()
     */
    public function testEnqueueAndDequeue(): void
    {
        $queue = new Queue();

        $queue
            ->enqueue('1')
            ->enqueue('2')
            ->enqueue('3')
            ->enqueue('4')
            ->enqueue('5');

        $result = implode('', [
            $queue->dequeue(),
            $queue->dequeue(),
            $queue->dequeue(),
            $queue->dequeue(),
            $queue->dequeue(),
        ]);

        $this->assertEquals('12345', $result);
    }

    /**
     * @covers ::dequeue
     * @uses \Chetkov\DataStructures\Sequence\Queue\Queue::isEmpty()
     */
    public function testDequeueFromEmptyQueue(): void
    {
        $queue = new Queue();

        $this->expectException(QueueIsEmptyException::class);
        $queue->dequeue();
    }

    /**
     * @covers ::isEmpty
     * @uses \Chetkov\DataStructures\Sequence\Queue\Queue::enqueue()
     * @uses \Chetkov\DataStructures\Sequence\AbstractSequence
     */
    public function testIsEmpty(): void
    {
        $queue = new Queue();
        $this->assertTrue($queue->isEmpty());

        $queue->enqueue('1');
        $this->assertFalse($queue->isEmpty());
    }

    /**
     * @covers ::contains
     * @uses \Chetkov\DataStructures\Sequence\Queue\Queue::enqueue()
     * @uses \Chetkov\DataStructures\Sequence\AbstractSequence::put()
     */
    public function testContains(): void
    {
        $queue = new Queue();
        $queue->enqueue('A');
        $this->assertTrue($queue->contains('A'));
        $this->assertFalse($queue->contains('B'));
    }
}
