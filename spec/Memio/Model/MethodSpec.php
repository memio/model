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

use Memio\Model\Argument;
use Memio\Model\Phpdoc\MethodPhpdoc;
use PhpSpec\ObjectBehavior;

class MethodSpec extends ObjectBehavior
{
    const NAME = '__construct';

    function let()
    {
        $this->beConstructedWith(self::NAME);
    }

    function it_has_a_name()
    {
        $this->name->shouldBe(self::NAME);
    }

    function it_can_have_phpdoc(MethodPhpdoc $phpdoc)
    {
        $this->methodPhpdoc->shouldBe(null);
        $this->setPhpdoc($phpdoc);
        $this->methodPhpdoc->shouldBe($phpdoc);
    }

    function it_can_be_abstract()
    {
        $this->isAbstract->shouldBe(false);

        $this->makeAbstract();
        $this->isAbstract->shouldBe(true);

        $this->removeAbstract();
        $this->isAbstract->shouldBe(false);
    }

    function it_can_be_final()
    {
        $this->isFinal->shouldBe(false);

        $this->makeFinal();
        $this->isFinal->shouldBe(true);

        $this->removeFinal();
        $this->isFinal->shouldBe(false);
    }

    function it_can_have_visibility()
    {
        $this->visibility->shouldBe('public');

        $this->makePrivate();
        $this->visibility->shouldBe('private');

        $this->makeProtected();
        $this->visibility->shouldBe('protected');

        $this->removeVisibility();
        $this->visibility->shouldBe('');

        $this->makePublic();
        $this->visibility->shouldBe('public');
    }

    function it_can_have_staticness()
    {
        $this->isStatic->shouldBe(false);

        $this->makeStatic();
        $this->isStatic->shouldBe(true);

        $this->removeStatic();
        $this->isStatic->shouldBe(false);
    }

    function it_can_have_arguments(Argument $argument)
    {
        $this->arguments->shouldBe([]);
        $this->addArgument($argument);
        $this->arguments->shouldBe([$argument]);
    }

    function it_can_have_a_return_type()
    {
        $this->returnType->shouldBe(null);
        $this->setReturnType('array');
        $this->returnType->shouldBe('array');
    }

    function it_can_have_a_body()
    {
        $body = <<<'EOT'
        $length = strlen('Nobody expects the spanish inquisition');
EOT;
        $this->setBody($body);
        $this->body->shouldBe($body);
    }
}
