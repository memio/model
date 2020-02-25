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
    public $type;
    public $name;
    public $description;

    /**
     * @api
     */
    public function __construct(
        string $type,
        string $name,
        ?string $description = null
    ) {
        $this->type = new Type($type);
        $this->name = $name;
        $this->description = $description;
    }
}
