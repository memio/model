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
    private $projectName;
    private $authorName;
    private $authorEmail;

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

    /**
     * @deprecated
     */
    public static function make(
        string $projectName,
        string $authorName,
        string $authorEmail
    ): self {
        return new self($projectName, $authorName, $authorEmail);
    }

    public function getProjectName(): string
    {
        return $this->projectName;
    }

    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    public function getAuthorEmail(): string
    {
        return $this->authorEmail;
    }
}
