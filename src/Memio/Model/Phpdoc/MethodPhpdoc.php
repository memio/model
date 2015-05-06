<?php

/*
 * This file is part of the memio/model package.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
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
    /**
     * @var ApiTag
     */
    protected $apiTag;

    /**
     * @var DeprecationTag
     */
    protected $deprecationTag;

    /**
     * @var Description
     */
    protected $description;

    /**
     * @var array
     */
    protected $parameterTags = array();

    /**
     * @return MethodPhpdoc
     *
     * @api
     */
    public static function make()
    {
        return new self();
    }

    /**
     * @param ApiTag $apiTag
     *
     * @return MethodPhpdoc
     *
     * @api
     */
    public function setApiTag(ApiTag $apiTag)
    {
        $this->apiTag = $apiTag;

        return $this;
    }

    /**
     * @param Description $description
     *
     * @return MethodPhpdoc
     *
     * @api
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param DeprecationTag $deprecationTag
     *
     * @return MethodPhpdoc
     *
     * @api
     */
    public function setDeprecationTag(DeprecationTag $deprecationTag)
    {
        $this->deprecationTag = $deprecationTag;

        return $this;
    }

    /**
     * @return ApiTag
     */
    public function getApiTag()
    {
        return $this->apiTag;
    }

    /**
     * @return Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Deprecation
     */
    public function getDeprecationTag()
    {
        return $this->deprecationTag;
    }

    /**
     * @param ParameterTag $parameterTag
     *
     * @return MethodPhpdoc
     *
     * @api
     */
    public function addParameterTag(ParameterTag $parameterTag)
    {
        $this->parameterTags[] = $parameterTag;

        return $this;
    }

    /**
     * @return array
     */
    public function getParameterTags()
    {
        return $this->parameterTags;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        $hasApiTag = (null !== $this->apiTag);
        $hasDescription = (null !== $this->description);
        $hasDeprecationTag = (null !== $this->deprecationTag);

        return !$hasApiTag && !$hasDescription && !$hasDeprecationTag && empty($this->parameterTags);
    }
}
