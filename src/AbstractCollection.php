<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;

abstract class AbstractCollection implements Collection
{
    protected $elements = [];

    /** @var CollectionIterator */
    protected $iterator;

    abstract public function clear(): void;

    public function __construct(CollectionIterator $iterator)
    {
        $this->iterator = $iterator;
        $this->iterator->setElements($this->elements);
    }

    public function isEmpty(): bool
    {
        return empty($this->elements);
    }

    /**
     * @inheritdoc
     */
    public function getIterator(): CollectionIterator
    {
        return $this->iterator;
    }

    /**
     * @inheritdoc
     */
    public function count(): int
    {
        return count($this->elements);
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize(): array
    {
        return $this->elements;
    }
}