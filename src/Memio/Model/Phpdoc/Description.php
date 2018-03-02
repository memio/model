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
    private $description = [];

    /**
     * @api
     */
    public function __construct(string $line)
    {
        $this->description[] = $line;
    }

    /**
     * @deprecated
     */
    public static function make(string $line): self
    {
        return new self($line);
    }

    /**
     * @api
     */
    public function addEmptyLine(): self
    {
        $this->description[] = '';

        return $this;
    }

    /**
     * @api
     */
    public function addLine(string $line): self
    {
        $this->description[] = $line;

        return $this;
    }

    public function all(): array
    {
        return $this->description;
    }
}
