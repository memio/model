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

use Memio\Model\FullyQualifiedName;

/**
 * @api
 */
class Type
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var FullyQualifiedName
     */
    protected $fullyqualifiedName;

    /**
     * @var bool
     */
    protected $isObject;

    /**
     * @var bool
     */
    protected $hasTypeHint;

    /**
     * @param string $name
     *
     * @api
     */
    public function __construct($name)
    {
        $nonObjectTypes = array('string', 'bool', 'int', 'double', 'callable', 'resource', 'array', 'null', 'mixed');
        $isCallableFromPhp54 = ('callable' === $name && version_compare(PHP_VERSION, '5.4.0') >= 0);

        $this->isObject = !in_array($name, $nonObjectTypes, true);
        $this->hasTypeHint =  ($isCallableFromPhp54 || $this->isObject || 'array' === $name);
        if ($this->isObject) {
            $this->fullyqualifiedName = new FullyqualifiedName($name);
            $name = $this->fullyqualifiedName->getName();
        }
        $this->name = $name;
    }

    /**
     * @param string $name
     *
     * @return Type
     *
     * @api
     */
    public static function make($name)
    {
        return new self($name);
    }

    /**
     * @return string
     *
     * @api
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFullyQualifiedName()
    {
        return $this->fullyqualifiedName->getFullyQualifiedName();
    }

    /**
     * @return bool
     *
     * @api
     */
    public function isObject()
    {
        return $this->isObject;
    }

    /**
     * @return bool
     */
    public function hasTypeHint()
    {
        return $this->hasTypeHint;
    }
}
