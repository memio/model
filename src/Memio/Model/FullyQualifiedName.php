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
    public const NORMALIZATIONS = [
        'float' => 'double',
    ];
    public $fullyQualifiedName;
    public $name;
    public $namespace;
    public $alias;

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
        $this->namespace = implode('\\', $namespaces);
        $this->fullyQualifiedName = trim($fullyQualifiedName, '\\');
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getName(): string
    {
        return $this->alias ?? $this->name;
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
    public function removeAlias(): void
    {
        $this->alias = null;
    }
}
