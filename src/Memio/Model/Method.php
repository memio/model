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

use Memio\Model\Phpdoc\MethodPhpdoc;

/**
 * @api
 */
class Method
{
    public $name;
    public $methodPhpdoc;
    public $isAbstract = false;
    public $isFinal = false;
    public $visibility = 'public';
    public $isStatic = false;
    public $arguments = [];
    public $body = '';
    public $returnType;

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
    public function setPhpdoc(MethodPhpdoc $methodPhpdoc): self
    {
        $this->methodPhpdoc = $methodPhpdoc;

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
    public function removeVisibility(): self
    {
        $this->visibility = '';

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
    public function makeStatic(): self
    {
        $this->isStatic = true;

        return $this;
    }

    /**
     * @api
     */
    public function removeStatic(): void
    {
        $this->isStatic = false;
    }

    /**
     * @api
     */
    public function addArgument(Argument $argument): self
    {
        $this->arguments[] = $argument;

        return $this;
    }

    /**
     * @api
     */
    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @api
     */
    public function setReturnType(?string $returnType): self
    {
        $this->returnType = $returnType;

        return $this;
    }
}
