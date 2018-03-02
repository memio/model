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

/**
 * @api
 */
class Argument
{
    private $type;
    private $name;
    private $defaultValue;
    private $isVariadic = false;

    /**
     * @api
     */
    public function __construct(string $type, string $name)
    {
        $this->type = new Type($type);
        $this->name = $name;
    }

    /**
     * @deprecated
     */
    public static function make(string $type, string $name): self
    {
        return new self($type, $name);
    }

    public function getType(): string
    {
        return $this->type->getName();
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @api
     */
    public function setDefaultValue(string $value): self
    {
        $this->defaultValue = $value;

        return $this;
    }

    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * @api
     */
    public function removeDefaultValue(): self
    {
        $this->defaultValue = null;

        return $this;
    }

    /**
     * @api
     */
    public function isVariadic(): bool
    {
        return $this->isVariadic;
    }

    /**
     * @api
     */
    public function makeVariadic(): self
    {
        $this->isVariadic = true;

        return $this;
    }

    /**
     * @api
     */
    public function removeVariadic(): self
    {
        $this->isVariadic = false;

        return $this;
    }
}
