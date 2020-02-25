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

class Description
{
    public $lines = [];

    /**
     * @api
     */
    public function __construct(string $line)
    {
        $this->lines[] = $line;
    }

    /**
     * @api
     */
    public function addEmptyLine(): self
    {
        $this->lines[] = '';

        return $this;
    }

    /**
     * @api
     */
    public function addLine(string $line): self
    {
        $this->lines[] = $line;

        return $this;
    }
}
