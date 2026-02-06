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

namespace spec\Memio\Model;

use PhpSpec\ObjectBehavior;

class ArgumentSpec extends ObjectBehavior
{
    function let(): void
    {
        $this->beConstructedWith('array', 'lines');
    }

    function it_has_a_type(): void
    {
        $this->type->name->shouldBe('array');
    }

    function it_has_a_name(): void
    {
        $this->name->shouldBe('lines');
    }

    function it_can_have_default_value(): void
    {
        $this->defaultValue->shouldBe(null);

        $this->setDefaultValue('null');
        $this->defaultValue->shouldBe('null');

        $this->removeDefaultValue();
        $this->defaultValue->shouldBe(null);
    }

    function it_can_be_variadic(): void
    {
        $this->isVariadic()->shouldBe(false);

        $this->makeVariadic();
        $this->isVariadic()->shouldBe(true);

        $this->removeVariadic();
        $this->isVariadic()->shouldBe(false);
    }
}
