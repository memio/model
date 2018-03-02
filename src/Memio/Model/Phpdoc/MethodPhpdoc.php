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
class MethodPhpdoc
{
    private $apiTag;
    private $deprecationTag;
    private $returnTag;
    private $description;
    private $parameterTags = [];
    private $throwTags = [];

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
    public function setApiTag(ApiTag $apiTag): self
    {
        $this->apiTag = $apiTag;

        return $this;
    }

    /**
     * @api
     */
    public function setReturnTag(ReturnTag $returnTag): self
    {
        $this->returnTag = $returnTag;

        return $this;
    }

    /**
     * @api
     */
    public function setDescription($description): self
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

    public function getApiTag()
    {
        return $this->apiTag;
    }

    public function getReturnTag()
    {
        return $this->returnTag;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDeprecationTag()
    {
        return $this->deprecationTag;
    }

    /**
     * @api
     */
    public function addParameterTag(ParameterTag $parameterTag): self
    {
        $this->parameterTags[] = $parameterTag;

        return $this;
    }

    public function getParameterTags(): array
    {
        return $this->parameterTags;
    }

    /**
     * @api
     */
    public function addThrowTag(ThrowTag $throwTag): self
    {
        $this->throwTags[] = $throwTag;

        return $this;
    }

    public function getThrowTags(): array
    {
        return $this->throwTags;
    }

    public function isEmpty(): bool
    {
        $hasApiTag = (null !== $this->apiTag);
        $hasDescription = (null !== $this->description);
        $hasDeprecationTag = (null !== $this->deprecationTag);
        $hasReturnTag = (null !== $this->returnTag);

        return
            !$hasApiTag
            && !$hasDescription
            && !$hasDeprecationTag
            && !$hasReturnTag
            && empty($this->parameterTags)
            && empty($this->throwTags)
        ;
    }
}
