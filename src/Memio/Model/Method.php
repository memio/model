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
    private $name;
    private $methodPhpdoc;
    private $isAbstract = false;
    private $isFinal = false;
    private $visibility = 'public';
    private $isStatic = false;
    private $arguments = [];
    private $body = '';
    private $returnType;

    /**
     * @param string $name
     *
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
    public function setPhpdoc(MethodPhpdoc $methodPhpdoc): self
    {
        $this->methodPhpdoc = $methodPhpdoc;

        return $this;
    }

    public function getPhpdoc()
    {
        return $this->methodPhpdoc;
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

    public function getVisibility(): string
    {
        return $this->visibility;
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
    public function addArgument(Argument $argument): self
    {
        $this->arguments[] = $argument;

        return $this;
    }

    public function allArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @api
     */
    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $returnType
     *
     * @return self
     *
     * @{pi
     */
    public function setReturnType($returnType)
    {
        $this->returnType = $returnType;

        return $this;
    }

    /**
     * @return string
     */
    public function getReturnType()
    {
        return $this->returnType;
    }
}
