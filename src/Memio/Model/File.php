<?php

/*
 * This file is part of the memio/model package.
 *
 * (c) Loïc Faugeron <faugeron.loic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Memio\Model;

use Memio\Model\Phpdoc\LicensePhpdoc;

/**
 * @api
 */
class File
{
    public $filename;
    public $licensePhpdoc;
    public $fullyQualifiedNames = [];
    public $structure;

    /**
     * @api
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    /**
     * @api
     */
    public function setLicensePhpdoc(LicensePhpdoc $licensePhpdoc): self
    {
        $this->licensePhpdoc = $licensePhpdoc;

        return $this;
    }

    /**
     * @api
     */
    public function removeLicensePhpdoc(): void
    {
        $this->licensePhpdoc = null;
    }

    /**
     * @api
     */
    public function addFullyQualifiedName(FullyQualifiedName $fullyQualifiedName): self
    {
        $this->fullyQualifiedNames[] = $fullyQualifiedName;

        return $this;
    }

    /**
     * @api
     */
    public function setStructure(Structure $structure): self
    {
        $this->structure = $structure;

        return $this;
    }
}
