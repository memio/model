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

class ThrowTag
{
    private $exception;

    /**
     * @api
     */
    public function __construct(string $exception)
    {
        $this->exception = $exception;
    }

    /**
     * @deprecated
     */
    public static function make(string $exception): self
    {
        return new self($exception);
    }

    public function getException(): string
    {
        return $this->exception;
    }
}
