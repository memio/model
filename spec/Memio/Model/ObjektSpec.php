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

    function let()
    {
        $this->beConstructedWith(self::FULLY_QUALIFIED_NAME);
    }

    function it_is_a_structure()
    {
        $this->shouldImplement('Memio\Model\Structure');
    }

    function it_has_a_fully_qualified_name()
    {
        $this->getFullyQualifiedName()->shouldBe(self::FULLY_QUALIFIED_NAME);
    }

    function it_has_a_name()
    {
        $this->getName()->shouldBe(self::NAME);
    }

    function it_has_a_namespace()
    {
        $this->getNamespace()->shouldBe(self::NAMESPACE_);
    }

    function it_can_have_phpdoc(StructurePhpdoc $phpdoc)
    {
        $this->getPhpdoc()->shouldBe(null);
        $this->setPhpdoc($phpdoc);
        $this->getPhpdoc()->shouldBe($phpdoc);
    }

    function it_can_be_abstract()
    {
        $this->isAbstract()->shouldBe(false);
        $this->makeAbstract();
        $this->isAbstract()->shouldBe(true);
        $this->removeAbstract();
        $this->isAbstract()->shouldBe(false);
    }

    function it_can_be_final()
    {
        $this->isFinal()->shouldBe(false);
        $this->makeFinal();
        $this->isFinal()->shouldBe(true);
        $this->removeFinal();
        $this->isFinal()->shouldBe(false);
    }

    function it_can_have_a_parent(Objekt $parent)
    {
        $this->hasParent()->shouldBe(false);
        $this->getParent()->shouldBe(null);

        $this->extend($parent);
        $this->hasParent()->shouldBe(true);
        $this->getParent()->shouldBe($parent);

        $this->removeParent();
        $this->hasParent()->shouldBe(false);
        $this->getParent()->shouldBe(null);
    }

    function it_can_implement_contracts(Contract $contract)
    {
        $this->allContracts()->shouldBe([]);
        $this->implement($contract);
        $this->allContracts()->shouldBe([$contract]);
    }

    function it_can_have_constants(Constant $constant)
    {
        $this->allConstants()->shouldBe([]);
        $this->addConstant($constant);
        $this->allConstants()->shouldBe([$constant]);
    }

    function it_can_have_properties(Property $property)
    {
        $this->allProperties()->shouldBe([]);
        $this->addProperty($property);
        $this->allProperties()->shouldBe([$property]);
    }

    function it_can_have_methods(Method $method)
    {
        $this->allMethods()->shouldBe([]);
        $this->addMethod($method);
        $this->allMethods()->shouldBe([$method]);
    }
}
