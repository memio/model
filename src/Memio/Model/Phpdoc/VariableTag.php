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

class VariableTag
{
    public $type;

    /**
     * @api
     */
    public function __construct(string $type)
    {
        $this->type = new Type($type);
    }
}
