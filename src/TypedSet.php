<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;

use Webkonstruktor\Collection\Exception\InvalidElementTypeException;
use Webkonstruktor\Collection\Validator\TypeValidator;

class TypedSet extends Set
{
    /** @var string */
    private $type;

    /** @var TypeValidator */
    private $validator;

    public function __construct(string $type, TypeValidator $validator, CollectionIterator $iterator)
    {
        $this->type = $type;
        $this->validator = $validator;

        parent::__construct($iterator);
    }

    public function push($item): void
    {
        if (!$this->validator->validate($item, $this->type)) {
            throw new InvalidElementTypeException(gettype($item), $this->type);
        }

        parent::push($item);
    }
}