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

use Memio\Model\Phpdoc\PropertyPhpdoc;
use PhpSpec\ObjectBehavior;

class PropertySpec extends ObjectBehavior
{
    const NAME = 'dateTime';

    function let()
    {
        $this->beConstructedWith(self::NAME);
    }

    function it_has_a_name()
    {
        $this->name->shouldBe(self::NAME);
    }

    function it_can_have_phpdoc(PropertyPhpdoc $phpdoc)
    {
        $this->propertyPhpdoc->shouldBe(null);
        $this->setPhpdoc($phpdoc);
        $this->propertyPhpdoc->shouldBe($phpdoc);
    }

    function it_has_visibility()
    {
        $this->visibility->shouldBe('private');

        $this->makePublic();
        $this->visibility->shouldBe('public');

        $this->makeProtected();
        $this->visibility->shouldBe('protected');

        $this->makePrivate();
        $this->visibility->shouldBe('private');
    }

    function it_can_have_staticness()
    {
        $this->isStatic->shouldBe(false);

        $this->makeStatic();
        $this->isStatic->shouldBe(true);

        $this->removeStatic();
        $this->isStatic->shouldBe(false);
    }

    function it_can_have_a_default_value()
    {
        $this->defaultValue->shouldBe(null);
        $this->setDefaultValue('null');
        $this->defaultValue->shouldBe('null');
    }
}
