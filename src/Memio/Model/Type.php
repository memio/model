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
class Type
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $isObject;

    /**
     * @var bool
     */
    private $hasTypeHint;

    /**
     * @param string $name
     *
     * @api
     */
    public function __construct($name)
    {
        $normalizations = array(
            'boolean' => 'bool',
            'integer' => 'int',
            'double' => 'float',
            'NULL' => 'null',
        );
        if (isset($normalizations[$name])) {
            $name = $normalizations[$name];
        }

        $nonObjectTypes = array('string', 'bool', 'int', 'float', 'callable', 'resource', 'array', 'null', 'mixed');
        $scalarTypes = array('string', 'bool', 'float', 'int');
        $isCallableFromPhp54 = ('callable' === $name && version_compare(PHP_VERSION, '5.4.0') >= 0);
        $isScalarFromPhp70 = (in_array($name, $scalarTypes) && version_compare(PHP_VERSION, '7.0.0') >= 0);

        $this->isObject = !in_array($name, $nonObjectTypes, true);
        $this->hasTypeHint = ($isCallableFromPhp54 || $this->isObject || 'array' === $name || $isScalarFromPhp70);
        $this->name = $name;
    }

    /**
     * @param string $name
     *
     * @return self
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
