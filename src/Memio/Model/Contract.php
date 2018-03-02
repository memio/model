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
 * A PHP Interface ("interface" is a reserved word and cannot be used as classname).
 *
 * @api
 */
class Contract implements Structure
{
    private $fullyQualifiedName;
    private $structurePhpdoc;
    private $contracts = [];
    private $constants = [];
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
    public function extend(Contract $contract): self
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
