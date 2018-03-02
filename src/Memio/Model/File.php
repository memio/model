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
    private $filename;
    private $licensePhpdoc;
    private $fullyQualifiedNames = [];
    private $structure;

    /**
     * @api
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    /**
     * @deprecated
     */
    public static function make(string $filename): self
    {
        return new self($filename);
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @api
     */
    public function setLicensePhpdoc(LicensePhpdoc $licensePhpdoc): self
    {
        $this->licensePhpdoc = $licensePhpdoc;

        return $this;
    }

    public function getLicensePhpdoc()
    {
        return $this->licensePhpdoc;
    }

    /**
     * @api
     */
    public function removeLicensePhpdoc()
    {
        $this->licensePhpdoc = null;
    }

    public function getNamespace()
    {
        if (null === $this->structure) {
            return;
        }

        return $this->structure->getNamespace();
    }

    /**
     * @api
     */
    public function addFullyQualifiedName(FullyQualifiedName $fullyQualifiedName): self
    {
        $this->fullyQualifiedNames[] = $fullyQualifiedName;

        return $this;
    }

    public function allFullyQualifiedNames(): array
    {
        return $this->fullyQualifiedNames;
    }

    /**
     * @api
     */
    public function setStructure(Structure $structure): self
    {
        $this->structure = $structure;

        return $this;
    }

    public function getStructure()
    {
        return $this->structure;
    }
}
