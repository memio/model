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
class DeprecationTag
{
    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $description;

    /**
     * @param string $version
     * @param string $description
     *
     * @api
     */
    public function __construct($version = null, $description = null)
    {
        $this->version = $version;
        $this->description = $description;
    }

    /**
     * @param string $version
     * @param string $description
     *
     * @return DeprecationPhpdoc
     *
     * @api
     */
    public static function make($version, $description = null)
    {
        return new self($version, $description);
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
