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

use Memio\Model\Attribute;
use Memio\Model\Constant;
use Memio\Model\Contract;
use Memio\Model\Method;
use Memio\Model\Phpdoc\StructurePhpdoc;
use PhpSpec\ObjectBehavior;

class ContractSpec extends ObjectBehavior
{
    const FULLY_QUALIFIED_NAME = 'Vendor\Project\MyInterface';
    const NAME = 'MyInterface';
    const NAMESPACE_ = 'Vendor\Project';

    function let(): void
    {
        $this->beConstructedWith(self::FULLY_QUALIFIED_NAME);
    }

    function it_is_a_structure(): void
    {
        $this->shouldImplement('Memio\Model\Structure');
    }

    function it_has_a_fully_qualified_name(): void
    {
        $this->fullyQualifiedName->fullyQualifiedName->shouldBe(self::FULLY_QUALIFIED_NAME);
    }

    function it_has_a_name(): void
    {
        $this->getName()->shouldBe(self::NAME);
    }

    function it_has_a_namespace(): void
    {
        $this->getNamespace()->shouldBe(self::NAMESPACE_);
    }

    function it_can_have_phpdoc(StructurePhpdoc $phpdoc): void
    {
        $this->structurePhpdoc->shouldBe(null);
        $this->setPhpdoc($phpdoc);
        $this->structurePhpdoc->shouldBe($phpdoc);
    }

    function it_can_extend_contracts(Contract $contract): void
    {
        $this->contracts->shouldBe([]);
        $this->extend($contract);
        $this->contracts->shouldBe([$contract]);
    }

    function it_can_have_constants(Constant $constant): void
    {
        $this->constants->shouldBe([]);
        $this->addConstant($constant);
        $this->constants->shouldBe([$constant]);
    }

    function it_can_have_methods(Method $method): void
    {
        $this->methods->shouldBe([]);
        $this->addMethod($method);
        $this->methods->shouldBe([$method]);
    }

    function it_can_have_attributes(Attribute $attribute): void
    {
        $this->attributes->shouldBe([]);
        $this->addAttribute($attribute);
        $this->attributes->shouldBe([$attribute]);
    }
}
