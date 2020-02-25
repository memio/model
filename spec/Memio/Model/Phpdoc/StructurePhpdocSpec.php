<?php

/*
 * This file is part of the memio/model package.
 *
 * (c) Loïc Faugeron <faugeron.loic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Memio\Model\Phpdoc;

use Memio\Model\Phpdoc\ApiTag;
use Memio\Model\Phpdoc\DeprecationTag;
use Memio\Model\Phpdoc\Description;
use PhpSpec\ObjectBehavior;

class StructurePhpdocSpec extends ObjectBehavior
{
    function it_can_be_empty()
    {
        $this->isEmpty()->shouldBe(true);
    }

    function it_can_have_description(Description $description)
    {
        $this->setDescription($description);
        $this->description->shouldBe($description);
        $this->isEmpty(false);
    }

    function it_can_be_tagged_as_api(ApiTag $apiTag)
    {
        $this->setApiTag($apiTag);
        $this->apiTag->shouldBe($apiTag);
        $this->isEmpty()->shouldBe(false);
    }

    function it_can_be_tagged_as_deprecated(DeprecationTag $deprecationTag)
    {
        $this->setDeprecationTag($deprecationTag);
        $this->deprecationTag->shouldBe($deprecationTag);
        $this->isEmpty()->shouldBe(false);
    }
}
