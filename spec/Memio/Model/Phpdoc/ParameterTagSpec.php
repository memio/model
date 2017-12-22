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

use PhpSpec\ObjectBehavior;

class ParameterTagSpec extends ObjectBehavior
{
    function it_has_a_type_and_a_name()
    {
        $this->beConstructedWith('Vendor\Project\MyClass', 'myClass');

        $this->getType()->shouldBe('Vendor\Project\MyClass');
        $this->getName()->shouldBe('myClass');
    }

    function it_can_have_a_description()
    {
        $this->beConstructedWith('Vendor\Project\MyClass', 'myClass', 'description');

        $this->getType()->shouldBe('Vendor\Project\MyClass');
        $this->getName()->shouldBe('myClass');
        $this->getDescription()->shouldBe('description');
    }
}
