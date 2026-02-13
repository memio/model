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

/**
 * @api
 */
class Argument
{
    public array $attributes = [];
    public string $visibility = '';
    public Type $type;
    public ?string $defaultValue = null;
    public bool $isVariadic = false;

    /**
     * @api
     */
    public function __construct(string $type, public string $name)
    {
        $this->type = new Type($type);
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
    public function removeAttributes(): void
    {
        $this->attributes = [];
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

    /**
     * @api
     */
    public function makePublic(): self
    {
        $this->visibility = 'public';

        return $this;
    }

    /**
     * @api
     */
    public function makeProtected(): self
    {
        $this->visibility = 'protected';

        return $this;
    }

    /**
     * @api
     */
    public function makePrivate(): self
    {
        $this->visibility = 'private';

        return $this;
    }

    /**
     * @api
     */
    public function removeVisibility(): self
    {
        $this->visibility = '';

        return $this;
    }
}
