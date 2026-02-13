<?php

declare(strict_types=1);

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
    public FullyQualifiedName $fullyQualifiedName;
    public ?StructurePhpdoc $structurePhpdoc = null;
    public array $attributes = [];
    public array $contracts = [];
    public array $constants = [];
    public array $methods = [];

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
    public function addAttribute(Attribute $attribute): self
    {
        $this->attributes[] = $attribute;

        return $this;
    }

    /**
     * @api
     */
    public function extend(Contract $contract): self
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
    public function addMethod(Method $method): self
    {
        $this->methods[] = $method;

        return $this;
    }
}
