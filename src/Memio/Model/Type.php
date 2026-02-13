<?php

declare(strict_types=1);

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

    public string $name;
    public bool $isObject;
    public bool $hasTypeHint;
    public bool $isNullable;
    public bool $isUnionType = false;
    /** @var Type[] */
    public array $types = [];

    /**
     * @api
     */
    public function __construct(string $name)
    {
        $this->isNullable = str_starts_with($name, '?');
        if ($this->isNullable) {
            $name = substr($name, 1);
        }
        if (str_contains($name, '|')) {
            $this->isUnionType = true;
            $this->hasTypeHint = true;
            $this->isObject = false;
            $parts = explode('|', $name);
            $normalizedParts = [];
            foreach ($parts as $part) {
                $type = new self($part);
                $this->types[] = $type;
                $normalizedParts[] = $type->name;
                if ('null' === $type->name) {
                    $this->isNullable = true;
                }
            }
            $this->name = implode('|', $normalizedParts);

            return;
        }
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

    /**
     * @api
     */
    public function isNullable(): bool
    {
        return $this->isNullable;
    }
}
