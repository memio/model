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
    public $name;
    public $propertyPhpdoc;
    public $isStatic = false;
    public $visibility = 'private';
    public $defaultValue;

    /**
     * @api
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @api
     */
    public function setPhpdoc(PropertyPhpdoc $propertyPhpdoc): self
    {
        $this->propertyPhpdoc = $propertyPhpdoc;

        return $this;
    }

    /**
     * @api
     */
    public function makeStatic(): self
    {
        $this->isStatic = true;

        return $this;
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

    /**
     * @api
     */
    public function setDefaultValue(string $defaultValue): self
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }
}
