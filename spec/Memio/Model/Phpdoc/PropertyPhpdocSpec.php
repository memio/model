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

namespace spec\Memio\Model\Phpdoc;

use Memio\Model\Phpdoc\VariableTag;
use PhpSpec\ObjectBehavior;

class PropertyPhpdocSpec extends ObjectBehavior
{
    function it_can_be_empty(): void
    {
        $this->isEmpty()->shouldBe(true);
    }

    function it_can_have_a_property_tag(VariableTag $variableTag): void
    {
        $this->setVariableTag($variableTag);
        $this->variableTag->shouldBe($variableTag);
        $this->isEmpty(false);
    }
}
