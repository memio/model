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
    private $fullyQualifiedName;
    private $structurePhpdoc;
    private $isAbstract = false;
    private $isFinal = false;
    private $parent;
    private $contracts = [];
    private $constants = [];
    private $properties = [];
    private $methods = [];

    /**
     * @api
     */
    public function __construct(string $fullyQualifiedName)
    {
        $this->fullyQualifiedName = new FullyQualifiedName($fullyQualifiedName);
    }

    /**
     * @deprecated
     */
    public static function make(string $fullyQualifiedName): self
    {
        return new self($fullyQualifiedName);
    }

    public function getFullyQualifiedName(): string
    {
        return $this->fullyQualifiedName->getFullyQualifiedName();
    }

    public function getName(): string
    {
        return $this->fullyQualifiedName->getName();
    }

    public function getNamespace(): string
    {
        return $this->fullyQualifiedName->getNamespace();
    }

    public function setPhpdoc(StructurePhpdoc $structurePhpdoc): self
    {
        $this->structurePhpdoc = $structurePhpdoc;

        return $this;
    }

    public function getPhpdoc()
    {
        return $this->structurePhpdoc;
    }

    /**
     * @api
     */
    public function makeAbstract(): self
    {
        $this->isAbstract = true;

        return $this;
    }

    public function isAbstract(): bool
    {
        return $this->isAbstract;
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

    public function isFinal(): bool
    {
        return $this->isFinal;
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

    public function getParent()
    {
        return $this->parent;
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

    public function allContracts(): array
    {
        return $this->contracts;
    }

    /**
     * @api
     */
    public function addConstant(Constant $constant): self
    {
        $this->constants[] = $constant;

        return $this;
    }

    public function allConstants(): array
    {
        return $this->constants;
    }

    /**
     * @api
     */
    public function addProperty(Property $property): self
    {
        $this->properties[] = $property;

        return $this;
    }

    public function allProperties(): array
    {
        return $this->properties;
    }

    /**
     * @api
     */
    public function addMethod(Method $method): self
    {
        $this->methods[] = $method;

        return $this;
    }

    public function allMethods(): array
    {
        return $this->methods;
    }
}
