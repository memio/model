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
class ApiTag
{
    /**
     * @var string
     */
    protected $since;

    /**
     * @param string $since
     *
     * @api
     */
    public function __construct($since = null)
    {
        $this->since = $since;
    }

    /**
     * @param string $since
     *
     * @return ApiTag
     *
     * @api
     */
    public static function make($since = null)
    {
        return new self($since);
    }

    /**
     * @return string
     */
    public function getSince()
    {
        return $this->since;
    }
}
