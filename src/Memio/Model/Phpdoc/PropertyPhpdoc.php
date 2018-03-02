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
class PropertyPhpdoc
{
    private $variableTag;

    /**
     * @deprecated
     */
    public static function make(): self
    {
        return new self();
    }

    /**
     * @api
     */
    public function setVariableTag(VariableTag $variableTag): self
    {
        $this->variableTag = $variableTag;

        return $this;
    }

    public function getVariableTag()
    {
        return $this->variableTag;
    }

    public function isEmpty(): bool
    {
        return null === $this->variableTag;
    }
}
