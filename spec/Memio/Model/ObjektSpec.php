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
use Memio\Model\Objekt;
use Memio\Model\Phpdoc\StructurePhpdoc;
use Memio\Model\Property;
use PhpSpec\ObjectBehavior;

class ObjektSpec extends ObjectBehavior
{
    const FULLY_QUALIFIED_NAME = 'Vendor\Project\MyClass';
    const NAME = 'MyClass';
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
        $this->getFullyQualifiedName()->fullyQualifiedName->shouldBe(self::FULLY_QUALIFIED_NAME);
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

    function it_can_be_abstract(): void
    {
        $this->isAbstract->shouldBe(false);
        $this->makeAbstract();
        $this->isAbstract->shouldBe(true);
        $this->removeAbstract();
        $this->isAbstract->shouldBe(false);
    }

    function it_can_be_final(): void
    {
        $this->isFinal->shouldBe(false);
        $this->makeFinal();
        $this->isFinal->shouldBe(true);
        $this->removeFinal();
        $this->isFinal->shouldBe(false);
    }

    function it_can_have_a_parent(Objekt $parent): void
    {
        $this->hasParent()->shouldBe(false);
        $this->parent->shouldBe(null);

        $this->extend($parent);
        $this->hasParent()->shouldBe(true);
        $this->parent->shouldBe($parent);

        $this->removeParent();
        $this->hasParent()->shouldBe(false);
        $this->parent->shouldBe(null);
    }

    function it_can_implement_contracts(Contract $contract): void
    {
        $this->contracts->shouldBe([]);
        $this->implement($contract);
        $this->contracts->shouldBe([$contract]);
    }

    function it_can_have_constants(Constant $constant): void
    {
        $this->constants->shouldBe([]);
        $this->addConstant($constant);
        $this->constants->shouldBe([$constant]);
    }

    function it_can_have_properties(Property $property): void
    {
        $this->properties->shouldBe([]);
        $this->addProperty($property);
        $this->properties->shouldBe([$property]);
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
