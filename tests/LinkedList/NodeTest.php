<?php

namespace Tests\Chetkov\DataStructures\LinkedList;

use Chetkov\DataStructures\LinkedList\Node;
use PHPUnit\Framework\TestCase;

/**
 * Class NodeTest
 * @package Tests\Chetkov\DataStructures\LinkedList
 * @coversDefaultClass \Chetkov\DataStructures\LinkedList\Node
 */
class NodeTest extends TestCase
{
    private const VALUE = 'value';

    /** @var Node */
    private $node;

    protected function setUp()
    {
        $this->node = new Node(self::VALUE);
    }

    /**
     * @covers ::__construct
     */
    public function test__construct(): void
    {
        $this->assertInstanceOf(Node::class, $this->node);
    }

    /**
     * @covers ::getValue
     * @uses \Chetkov\DataStructures\LinkedList\Node::__construct
     */
    public function testGetValue(): void
    {
        $this->assertEquals(self::VALUE, $this->node->getValue());
    }

    /**
     * @covers ::setNext
     * @uses \Chetkov\DataStructures\LinkedList\Node::__construct
     */
    public function testSetNext(): void
    {
        $nextNode = new Node(self::VALUE);
        $this->node->setNext($nextNode);
        $this->assertTrue(true);
    }

    /**
     * @covers ::getNext
     * @uses \Chetkov\DataStructures\LinkedList\Node::__construct
     */
    public function testGetNextReturnsNull(): void
    {
        $node = new Node(self::VALUE);
        $this->assertNull($node->getNext());
    }

    /**
     * @covers ::getNext
     * @uses \Chetkov\DataStructures\LinkedList\Node::setNext
     * @uses \Chetkov\DataStructures\LinkedList\Node::__construct
     */
    public function testGetNextReturnsNode(): void
    {
        $node = new Node(self::VALUE);
        $nextNode = new Node(self::VALUE);
        $node->setNext($nextNode);
        $this->assertEquals($nextNode, $node->getNext());
    }

    /**
     * @covers ::__construct
     * @covers ::getValue
     * @covers ::getNext
     */
    public function testChainOfNodes(): void
    {
        $node5 = new Node(5);
        $node4 = new Node(4, $node5);
        $node3 = new Node(3, $node4);
        $node2 = new Node(2, $node3);
        $node = new Node(1, $node2);

        $result = implode(' ', [
            $node->getValue(),
            $node->getNext()->getValue(),
            $node->getNext()->getNext()->getValue(),
            $node->getNext()->getNext()->getNext()->getValue(),
            $node->getNext()->getNext()->getNext()->getNext()->getValue(),
        ]);

        $this->assertEquals('1 2 3 4 5', $result);
    }
}
