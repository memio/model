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
class Attribute
{
    public ?string $arguments = null;

    /**
     * @api
     */
    public function __construct(
        public string $name,
    ) {
    }

    /**
     * @api
     */
    public function setArguments(string $arguments): self
    {
        $this->arguments = $arguments;

        return $this;
    }
}
