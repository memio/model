<?php

/*
 * This file is part of the memio/model package.
 *
 * (c) Loïc Faugeron <faugeron.loic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Memio\Model;

use Memio\Model\FullyQualifiedName;
use Memio\Model\Phpdoc\LicensePhpdoc;
use Memio\Model\Structure;
use PhpSpec\ObjectBehavior;

class FileSpec extends ObjectBehavior
{
    const FILENAME = 'src/Vendor/Project/MyClass.php';
    const NAMESPACE_ = 'Vendor\Project';
    const CLASSNAME = 'MyClass';

    function let()
    {
        $this->beConstructedWith(self::FILENAME);
    }

    function it_has_a_filename()
    {
        $this->filename->shouldBe(self::FILENAME);
    }

    function it_can_have_license_phpdoc(LicensePhpdoc $licensePhpdoc)
    {
        $this->licensePhpdoc->shouldBe(null);

        $this->setLicensePhpdoc($licensePhpdoc);
        $this->licensePhpdoc->shouldBe($licensePhpdoc);

        $this->removeLicensePhpdoc();
        $this->licensePhpdoc->shouldBe(null);
    }

    function it_has_a_namespace(Structure $structure)
    {
        $structure->getNamespace()->willReturn(self::NAMESPACE_);

        $this->setStructure($structure);

        $this->structure->getNamespace()->shouldBe(self::NAMESPACE_);
    }

    function it_can_have_fully_qualified_names(FullyQualifiedName $fullyQualifiedName)
    {
        $this->fullyQualifiedNames->shouldBe([]);
        $this->addFullyQualifiedName($fullyQualifiedName);
        $this->fullyQualifiedNames->shouldBe([$fullyQualifiedName]);
    }

    function it_has_a_structure(Structure $structure)
    {
        $this->setStructure($structure);

        $this->structure->shouldBe($structure);
    }
}
