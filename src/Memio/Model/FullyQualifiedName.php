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
    protected $fullyQualifiedName;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $namepace;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @param string $fullyQualifiedName
     *
     * @api
     */
    public function __construct($fullyQualifiedName)
    {
        $namespaces = explode('\\', $fullyQualifiedName);

        $this->name = array_pop($namespaces);
        $this->namepace = implode('\\', $namespaces);
        $this->fullyQualifiedName = trim($fullyQualifiedName, '\\');
    }

    /**
     * @param string $fullyQualifiedName
     *
     * @return FullyQualifiedName
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
    public function getName()
    {
        return (null === $this->alias) ? $this->name : $this->alias;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->namepace;
    }

    /**
     * @param string $alias
     *
     * @return FullyQualifiedName
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
     * @return FullyQualifiedName
     *
     * @api
     */
    public function removeAlias()
    {
        $this->alias = null;
    }
}
