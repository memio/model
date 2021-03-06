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

class DescriptionSpec extends ObjectBehavior
{
    const SHORT_DESCRIPTION = 'This is a short description';

    function let()
    {
        $this->beConstructedWith(self::SHORT_DESCRIPTION);
    }

    function it_has_a_short_description()
    {
        $this->lines->shouldBe([self::SHORT_DESCRIPTION]);
    }

    function it_can_have_empty_lines()
    {
        $this->addEmptyLine();

        $this->lines->shouldBe([self::SHORT_DESCRIPTION, '']);
    }

    function it_can_have_long_description()
    {
        $longDescription = [
            'Long descriptions can span on many lines',
            '',
            '    They can also have empty lines and indented ones.',
        ];

        foreach ($longDescription as $line) {
            $this->addLine($line);
        }

        $this->lines->shouldBe(array_merge(
            [self::SHORT_DESCRIPTION],
            $longDescription
        ));
    }
}
