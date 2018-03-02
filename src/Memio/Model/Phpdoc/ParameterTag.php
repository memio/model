<?php

/*
 * This file is part of the memio/model package.
 *
 * (c) Loïc Faugeron <faugeron.loic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Memio\Model\Phpdoc;

use Memio\Model\Type;

/**
 * @api
 */
class ParameterTag
{
    private $type;
    private $name;
    private $description;

    /**
     * @api
     */
    public function __construct(
        string $type,
        string $name,
        $description = null
    ) {
        $this->type = new Type($type);
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @deprecated
     */
    public static function make(
        string $type,
        string $name,
        $description = null
    ): self {
        return new self($type, $name, $description);
    }

    public function getType(): string
    {
        return $this->type->getName();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
