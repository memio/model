<?php

/*
 * This file is part of the memio/model package.
 *
 * (c) Loïc Faugeron <faugeron.loic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Memio\Model;

use Memio\Model\Phpdoc\StructurePhpdoc;

/**
 * A PHP Class ("class" and "Object" are a reserved words and cannot be used as classname).
 *
 * @api
 */
class Objekt implements Structure
{
    public $fullyQualifiedName;
    public $structurePhpdoc;
    public $isAbstract = false;
    public $isFinal = false;
    public $parent;
    public $contracts = [];
    public $constants = [];
    public $properties = [];
    public $methods = [];

    /**
     * @api
     */
    public function __construct(string $fullyQualifiedName)
    {
        $this->fullyQualifiedName = new FullyQualifiedName($fullyQualifiedName);
    }

    public function getFullyQualifiedName(): FullyQualifiedName
    {
        return $this->fullyQualifiedName;
    }

    public function getNamespace(): string
    {
        return $this->fullyQualifiedName->namespace;
    }

    public function getName(): string
    {
        return $this->fullyQualifiedName->getName();
    }

    /**
     * @api
     */
    public function setPhpdoc(StructurePhpdoc $structurePhpdoc): self
    {
        $this->structurePhpdoc = $structurePhpdoc;

        return $this;
    }

    /**
     * @api
     */
    public function makeAbstract(): self
    {
        $this->isAbstract = true;

        return $this;
    }

    /**
     * @api
     */
    public function removeAbstract(): self
    {
        $this->isAbstract = false;

        return $this;
    }

    /**
     * @api
     */
    public function makeFinal(): self
    {
        $this->isFinal = true;

        return $this;
    }

    /**
     * @api
     */
    public function removeFinal(): self
    {
        $this->isFinal = false;

        return $this;
    }

    /**
     * @api
     */
    public function extend(Objekt $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function hasParent(): bool
    {
        return null !== $this->parent;
    }

    /**
     * @api
     */
    public function removeParent(): self
    {
        $this->parent = null;

        return $this;
    }

    /**
     * @api
     */
    public function implement(Contract $contract): self
    {
        $this->contracts[] = $contract;

        return $this;
    }

    /**
     * @api
     */
    public function addConstant(Constant $constant): self
    {
        $this->constants[] = $constant;

        return $this;
    }

    /**
     * @api
     */
    public function addProperty(Property $property): self
    {
        $this->properties[] = $property;

        return $this;
    }

    /**
     * @api
     */
    public function addMethod(Method $method): self
    {
        $this->methods[] = $method;

        return $this;
    }
}
