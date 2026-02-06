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

class TypeSpec extends ObjectBehavior
{
    function it_can_be_an_object(): void
    {
        $this->beConstructedWith('Vendor\Project\MyClass');

        $this->getName()->shouldBe('Vendor\Project\MyClass');
        $this->isObject()->shouldBe(true);
    }

    function it_can_have_a_type_hint_if_it_is_an_object(): void
    {
        $this->beConstructedWith('DateTime');

        $this->hasTypeHint()->shouldBe(true);
    }

    function it_can_have_a_type_hint_if_it_is_an_array(): void
    {
        $this->beConstructedWith('array');

        $this->hasTypeHint()->shouldBe(true);
    }

    function it_can_have_a_type_hint_if_it_is_a_callable(): void
    {
        $this->beConstructedWith('callable');

        $this->hasTypeHint()->shouldBe(true);
    }

    function it_can_have_a_type_hint_if_it_is_a_string(): void
    {
        $this->beConstructedWith('string');

        $this->hasTypeHint()->shouldBe(true);
    }

    function it_can_have_a_type_hint_if_it_is_an_integer(): void
    {
        $this->beConstructedWith('int');

        $this->hasTypeHint()->shouldBe(true);
    }

    function it_can_have_a_type_hint_if_it_is_a_float(): void
    {
        $this->beconstructedwith('float');

        $this->hastypehint()->shouldbe(true);
    }

    function it_can_have_a_type_hint_if_it_is_a_boolean(): void
    {
        $this->beConstructedWith('bool');

        $this->hasTypeHint()->shouldBe(true);
    }

    function it_can_have_a_type_hint_if_it_is_a_string_from_php_7_0(): void
    {
        $this->beConstructedWith('string');

        $this->hasTypeHint()->shouldBe(version_compare(PHP_VERSION, '7.0.0') >= 0);
    }

    function it_can_have_a_type_hint_if_it_is_an_integer_from_php_7_0(): void
    {
        $this->beConstructedWith('int');

        $this->hasTypeHint()->shouldBe(version_compare(PHP_VERSION, '7.0.0') >= 0);
    }

    function it_can_have_a_type_hint_if_it_is_a_float_from_php_7_0(): void
    {
        $this->beConstructedWith('float');

        $this->hasTypeHint()->shouldBe(version_compare(PHP_VERSION, '7.0.0') >= 0);
    }

    function it_can_have_a_type_hint_if_it_is_a_boolean_from_php_7_0(): void
    {
        $this->beConstructedWith('bool');

        $this->hasTypeHint()->shouldBe(version_compare(PHP_VERSION, '7.0.0') >= 0);
    }

    function it_can_be_an_array(): void
    {
        $this->beConstructedWith('array');

        $this->getName()->shouldBe('array');
        $this->isObject()->shouldBe(false);
    }

    function it_can_be_a_callable(): void
    {
        $this->beConstructedWith('callable');

        $this->getName()->shouldBe('callable');
        $this->isObject()->shouldBe(false);
    }

    function it_can_be_a_string(): void
    {
        $this->beConstructedWith('string');

        $this->getName()->shouldBe('string');
        $this->isObject()->shouldBe(false);
    }

    function it_can_be_a_boolean(): void
    {
        $this->beConstructedWith('bool');

        $this->getName()->shouldBe('bool');
        $this->isObject()->shouldBe(false);
    }

    function it_normalizes_boolean_name(): void
    {
        $this->beConstructedWith('boolean');

        $this->getName()->shouldBe('bool');
        $this->isObject()->shouldBe(false);
    }

    function it_can_be_a_resource(): void
    {
        $this->beConstructedWith('resource');

        $this->getName()->shouldBe('resource');
        $this->isObject()->shouldBe(false);
    }

    function it_can_be_an_integer(): void
    {
        $this->beConstructedWith('int');

        $this->getName()->shouldBe('int');
        $this->isObject()->shouldBe(false);
    }

    function it_normalizes_integer_name(): void
    {
        $this->beConstructedWith('integer');

        $this->getName()->shouldBe('int');
        $this->isObject()->shouldBe(false);
    }

    function it_can_be_a_float(): void
    {
        $this->beConstructedWith('float');

        $this->getName()->shouldBe('float');
        $this->isObject()->shouldBe(false);
    }

    function it_normalizes_float_name(): void
    {
        $this->beConstructedWith('double');

        $this->getName()->shouldBe('float');
        $this->isObject()->shouldBe(false);
    }

    function it_can_be_null(): void
    {
        $this->beConstructedWith('null');

        $this->getName()->shouldBe('null');
        $this->isObject()->shouldBe(false);
    }

    function it_normalizes_null_name(): void
    {
        $this->beConstructedWith('NULL');

        $this->getName()->shouldBe('null');
        $this->isObject()->shouldBe(false);
    }

    function it_can_be_unknown(): void
    {
        $this->beConstructedWith('mixed');

        $this->getName()->shouldBe('mixed');
        $this->isObject()->shouldBe(false);
    }
}
