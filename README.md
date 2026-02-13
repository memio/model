# Memio's Models

Describe PHP code (classes/interfaces with their constants, properties, methods,
method arguments and even PHPdoc) by constructing "Model" objects.

> **Note**: This package is part of [Memio](http://memio.github.io/memio), a highly opinionated PHP code generator.
> Have a look at [the main repository](http://github.com/memio/memio).

## Installation

Install it using [Composer](https://getcomposer.org/download):

```console
composer require memio/model:^4.0
```

## Example

Let's say we want to describe the following constructor:

```php
    public function __construct(
        private ValueObject $valueObject,
        private string|int $type = self::TYPE_ONE,
        private ?bool $option = true,
    ) {
    }
```

In order to do so, we'd need to write the following:

```php
<?php

require __DIR__.'/vendor/autoload.php';

use Memio\Model\Argument;
use Memio\Model\Method;

$method = (new Method('__construct'))
    ->addArgument((new Argument('Vendor\Project\ValueObject', 'valueObject'))
        ->makePrivate()
    )
    ->addArgument((new Argument('string|int', 'type'))
        ->makePrivate()
        ->setDefaultValue('self::TYPE_ONE')
    )
    ->addArgument((new Argument('?bool', 'option'))
        ->makePrivate()
        ->setDefaultValue('true')
    )
;
```

This example showcases constructor property promotion, union types and nullable types.

Usually models aren't described manually like this, they would be built dynamically:

```php
// Let's say we've received the following parameters:
$parameters = [
    ['type' => 'Vendor\Project\ValueObject', 'name' => 'valueObject'],
    ['type' => 'string|int', 'name' => 'type', 'default' => 'self::TYPE_ONE'],
    ['type' => '?bool', 'name' => 'option', 'default' => 'true'],
];

$method = new Method('__construct');
foreach ($parameters as $parameter) {
    $argument = (new Argument($parameter['type'], $parameter['name']))
        ->makePrivate()
    ;
    if (isset($parameter['default'])) {
        $argument->setDefaultValue($parameter['default']);
    }
    $method->addArgument($argument);
}
```

We can build dynamically the models using a configuration file, user input, existing
source code, etc. Possibilities are endless!

Once built, these models can be further tweaked and converted to another format:
an array, source code, etc.

Have a look at [the main repository](http://github.com/memio/memio) to discover the full power of Memio.

## Want to know more?

Memio uses [phpspec](http://phpspec.net/), which means the tests also provide the documentation.
Not convinced? Then clone this repository and run the following commands:

```console
make lib-init                        # Set up Docker environment
make phpspec arg='--format pretty'   # Run the specifications
```

> **Note**: Run `make` or `make help` to see all available commands.

You can see the current and past versions using one of the following:

* the `git tag` command
* the [releases page on Github](https://github.com/memio/model/releases)
* the file listing the [changes between versions](CHANGELOG.md)

And finally some meta documentation:

* [copyright and MIT license](LICENSE)
* [versioning and branching models](VERSIONING.md)
* [contribution instructions](CONTRIBUTING.md)

## Roadmap

* get rid of `Type`
* extract `Import` (use statement) from `FullyQualifiedName`
* get rid of `FullyQualifiedName`
* support more PHPdoc stuff
