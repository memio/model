<?php

/*
 * This file is part of the memio/model package.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
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
    /**
     * @var string
     */
    private $qualifiedName;

    /**
     * @var string
     */
    private $unqualifiedName;

    /**
     * @var string
     */
    private $fullyQualifiedName;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @var string
     */
    private $alias;

    /**
     * @param string $fullyQualifiedName
     *
     * @api
     */
    public function __construct($fullyQualifiedName)
    {
        // Lets say that we have 'Foo\Bar' here
        $parts = explode('\\', trim($fullyQualifiedName, '\\'));

        // Bar
        $this->unqualifiedName = end($parts);

        // Foo\Bar
        $this->qualifiedName = implode('\\', $parts);

        // \Foo\Bar
        $this->fullyQualifiedName = '\\' . $this->qualifiedName;

        // Build namespace (Foo)
        array_pop($parts);

        if (count($parts)) {
            $this->namespace = self::make(implode('\\', $parts));
        }
    }

    /**
     * @param string $fullyQualifiedName
     *
     * @return self
     *
     * @api
     */
    public static function make($fullyQualifiedName)
    {
        return new self($fullyQualifiedName);
    }

    /**
     * @return string
     */
    public function getFullyQualifiedName()
    {
        return $this->fullyQualifiedName;
    }

    /**
     * @return string
     */
    public function getQualifiedName()
    {
        return $this->qualifiedName;
    }

    /**
     * @return string
     */
    public function getUnqualifiedName()
    {
        return $this->unqualifiedName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return (null === $this->alias) ? $this->getUnqualifiedName() : $this->alias;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return (null === $this->namespace) ? '' : $this->namespace->getFullyQualifiedName();
    }

    /**
     * @param string $alias
     *
     * @return self
     *
     * @api
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasAlias()
    {
        return (null !== $this->alias);
    }

    /**
     * @return self
     *
     * @api
     */
    public function removeAlias()
    {
        $this->alias = null;
    }
}
