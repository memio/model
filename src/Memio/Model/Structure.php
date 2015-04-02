<?php

/*
 * This file is part of the Memio project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
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
    /**
     * @return string
     */
    public function getFullyQualifiedName();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getNamespace();

    /**
     * @param StructurePhpdoc $structurePhpdoc
     *
     * @return Structure
     *
     * @api
     */
    public function setPhpdoc(StructurePhpdoc $structurePhpdoc);

    /**
     * @return StructurePhpdoc
     */
    public function getPhpdoc();
}
