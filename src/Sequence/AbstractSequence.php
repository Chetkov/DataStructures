<?php

namespace Chetkov\DataStructures\Sequence;

/**
 * Class AbstractSequence
 * @package Chetkov\DataStructures\Sequence
 */
abstract class AbstractSequence
{
    /** @var array */
    protected $storage = [];

    /**
     * @param $element
     * @return static
     */
    protected function put($element)
    {
        $this->storage[] = $element;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->storage);
    }

    /**
     * @param $element
     * @return bool
     */
    public function contains($element): bool
    {
        return in_array($element, $this->storage);
    }
}
