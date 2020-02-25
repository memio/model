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
    public $type;
    public $name;
    public $defaultValue;
    public $isVariadic = false;

    /**
     * @api
     */
    public function __construct(string $type, string $name)
    {
        $this->type = new Type($type);
        $this->name = $name;
    }

    /**
     * @api
     */
    public function setDefaultValue(string $value): self
    {
        $this->defaultValue = $value;

        return $this;
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
