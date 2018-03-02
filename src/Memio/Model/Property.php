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

use Memio\Model\Phpdoc\PropertyPhpdoc;

/**
 * @api
 */
class Property
{
    private $name;
    private $propertyPhpdoc;
    private $isStatic = false;
    private $visibility = 'private';
    private $defaultValue;

    /**
     * @api
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @deprecated
     */
    public static function make(string $name): self
    {
        return new self($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @api
     */
    public function setPhpdoc(PropertyPhpdoc $propertyPhpdoc): self
    {
        $this->propertyPhpdoc = $propertyPhpdoc;

        return $this;
    }

    public function getPhpdoc()
    {
        return $this->propertyPhpdoc;
    }

    /**
     * @api
     */
    public function makeStatic(): self
    {
        $this->isStatic = true;

        return $this;
    }

    public function isStatic(): bool
    {
        return $this->isStatic;
    }

    /**
     * @api
     */
    public function removeStatic()
    {
        $this->isStatic = false;
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
    public function makeProtected(): self
    {
        $this->visibility = 'protected';

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

    public function getVisibility(): string
    {
        return $this->visibility;
    }

    /**
     * @api
     */
    public function setDefaultValue(string $defaultValue): self
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }

    public function getDefaultValue()
    {
        return $this->defaultValue;
    }
}
