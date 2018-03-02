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
class DeprecationTag
{
    private $version;
    private $description;

    /**
     * @api
     */
    public function __construct($version = null, $description = null)
    {
        $this->version = $version;
        $this->description = $description;
    }

    /**
     * @deprecated
     */
    public static function make($version, $description = null): self
    {
        return new self($version, $description);
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
