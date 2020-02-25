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
class LicensePhpdoc
{
    public $projectName;
    public $authorName;
    public $authorEmail;

    /**
     * @api
     */
    public function __construct(
        string $projectName,
        string $authorName,
        string $authorEmail
    ) {
        $this->projectName = $projectName;
        $this->authorName = $authorName;
        $this->authorEmail = $authorEmail;
    }
}
