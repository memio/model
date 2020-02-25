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
    public $version;
    public $description;

    /**
     * @api
     */
    public function __construct(
        ?string $version = null,
        ?string $description = null
    ) {
        $this->version = $version;
        $this->description = $description;
    }
}
