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

namespace Memio\Model;

use Memio\Model\Phpdoc\StructurePhpdoc;

/**
 * Basically anything that can have a method (an interface, a class, etc).
 *
 * @api
 */
interface Structure
{
    public function getFullyQualifiedName(): FullyQualifiedName;

    public function getNamespace(): string;

    public function getName(): string;

    /**
     * @api
     */
    public function setPhpdoc(StructurePhpdoc $structurePhpdoc);

    /**
     * @api
     */
    public function addAttribute(Attribute $attribute);

    /**
     * @api
     */
    public function removeAttributes(): void;
}
