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

class AttributeSpec extends ObjectBehavior
{
    const NAME = 'Route';

    function let(): void
    {
        $this->beConstructedWith(self::NAME);
    }

    function it_has_a_name(): void
    {
        $this->name->shouldBe(self::NAME);
    }

    function it_can_have_arguments(): void
    {
        $this->arguments->shouldBe(null);

        $this->setArguments("'/api'");
        $this->arguments->shouldBe("'/api'");
    }
}
