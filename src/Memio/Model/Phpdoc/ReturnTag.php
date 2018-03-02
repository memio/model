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

class ReturnTag
{
    private $type;

    /**
     * @api
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * @deprecated
     */
    public static function make(string $type): self
    {
        return new self($type);
    }

    public function getType(): string
    {
        return $this->type;
    }
}
