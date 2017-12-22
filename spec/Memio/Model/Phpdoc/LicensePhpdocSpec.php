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

class LicensePhpdocSpec extends ObjectBehavior
{
    const PROJECT_NAME = 'gnugat/medio';
    const AUTHOR_NAME = 'Loïc Faugeron';
    const AUTHOR_EMAIL = 'faugeron.loic@gmail.com';

    function let()
    {
        $this->beConstructedWith(self::PROJECT_NAME, self::AUTHOR_NAME, self::AUTHOR_EMAIL);
    }

    function it_has_project_name()
    {
        $this->getProjectName()->shouldBe(self::PROJECT_NAME);
    }

    function it_has_author_name()
    {
        $this->getAuthorName()->shouldBe(self::AUTHOR_NAME);
    }

    function it_has_author_email()
    {
        $this->getAuthorEmail()->shouldBe(self::AUTHOR_EMAIL);
    }
}
