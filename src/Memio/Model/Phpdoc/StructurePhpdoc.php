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

namespace Memio\Model\Phpdoc;

/**
 * @api
 */
class StructurePhpdoc
{
    public ?ApiTag $apiTag = null;
    public ?DeprecationTag $deprecationTag = null;
    public ?Description $description = null;

    /**
     * @api
     */
    public function setApiTag(ApiTag $apiTag): self
    {
        $this->apiTag = $apiTag;

        return $this;
    }

    /**
     * @api
     */
    public function setDescription(Description $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @api
     */
    public function setDeprecationTag(DeprecationTag $deprecationTag): self
    {
        $this->deprecationTag = $deprecationTag;

        return $this;
    }

    public function isEmpty(): bool
    {
        $hasApiTag = (null !== $this->apiTag);
        $hasDescription = (null !== $this->description);
        $hasDeprecationTag = (null !== $this->deprecationTag);

        return !$hasApiTag && !$hasDescription && !$hasDeprecationTag;
    }
}
