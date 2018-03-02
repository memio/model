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

/**
 * @api
 */
class ApiTag
{
    private $since;

    /**
     * @api
     */
    public function __construct($since = null)
    {
        $this->since = $since;
    }

    /**
     * @deprecated
     */
    public static function make($since = null): self
    {
        return new self($since);
    }

    public function getSince()
    {
        return $this->since;
    }
}
