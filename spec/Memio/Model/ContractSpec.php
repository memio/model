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
use Memio\Model\Phpdoc\StructurePhpdoc;
use PhpSpec\ObjectBehavior;

class ContractSpec extends ObjectBehavior
{
    const FULLY_QUALIFIED_NAME = 'Vendor\Project\MyInterface';
    const NAME = 'MyInterface';
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

    function it_can_extend_contracts(Contract $contract)
    {
        $this->allContracts()->shouldBe(array());
        $this->extend($contract);
        $this->allContracts()->shouldBe(array($contract));
    }

    function it_can_have_constants(Constant $constant)
    {
        $this->allConstants()->shouldBe(array());
        $this->addConstant($constant);
        $this->allConstants()->shouldBe(array($constant));
    }

    function it_can_have_methods(Method $method)
    {
        $this->allMethods()->shouldBe(array());
        $this->addMethod($method);
        $this->allMethods()->shouldBe(array($method));
    }
}
