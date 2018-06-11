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
class FullyQualifiedName
{
    const NORMALIZATIONS = [
        'float' => 'double',
    ];
    private $fullyQualifiedName;
    private $name;
    private $namepace;
    private $alias;

    /**
     * @api
     */
    public function __construct(string $fullyQualifiedName)
    {
        if (isset(self::NORMALIZATIONS[$fullyQualifiedName])) {
            $fullyQualifiedName = self::NORMALIZATIONS[$fullyQualifiedName];
        }
        $namespaces = explode('\\', $fullyQualifiedName);

        $this->name = array_pop($namespaces);
        $this->namepace = implode('\\', $namespaces);
        $this->fullyQualifiedName = trim($fullyQualifiedName, '\\');
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
        return $this->fullyQualifiedName;
    }

    public function getName(): string
    {
        return (null === $this->alias) ? $this->name : $this->alias;
    }

    public function getNamespace(): string
    {
        return $this->namepace;
    }

    /**
     * @api
     */
    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    public function hasAlias(): bool
    {
        return null !== $this->alias;
    }

    /**
     * @api
     */
    public function removeAlias()
    {
        $this->alias = null;
    }
}
