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
    public const NORMALIZATIONS = [
        'double' => 'float',
        'boolean' => 'bool',
        'integer' => 'int',
        'NULL' => 'null',
    ];
    public const NON_OBJECT_TYPES = [
        'string',
        'bool',
        'int',
        'float',
        'callable',
        'resource',
        'array',
        'null',
        'mixed',
    ];
    const HAS_TYPE_HINT = [
        'array',
        'callable',
        'bool',
        'float',
        'int',
        'string',
    ];

    public $name;
    public $isObject;
    public $hasTypeHint;

    /**
     * @api
     */
    public function __construct(string $name)
    {
        if (isset(self::NORMALIZATIONS[$name])) {
            $name = self::NORMALIZATIONS[$name];
        }
        $this->isObject = !in_array($name, self::NON_OBJECT_TYPES, true);
        $this->hasTypeHint = (
            $this->isObject
            || in_array($name, self::HAS_TYPE_HINT, true)
        );
        $this->name = $name;
    }

    /**
     * @api
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @api
     */
    public function isObject(): bool
    {
        return $this->isObject;
    }

    /**
     * @api
     */
    public function hasTypeHint(): bool
    {
        return $this->hasTypeHint;
    }
}
