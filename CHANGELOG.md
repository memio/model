# CHANGELOG

## 2.0.4: Normalized float to double

Normalization from float to double, thanks to @ItsKelsBoys

## 2.0.3: Updated test suite

* upgraded PHP CS Fixer (from 1.6 to 2.10)
* upgraded phpspec (from 3.0 to 4.3)

## 2.0.1: PHP 7.2 support

Added support for PHP 7.2, thanks to @roukmoute

BC break: Object has be renamed to Objekt, has it is a reserved keyword.

## 2.0.0: PHP 7 and Return type hints

This release is the same as 2.0.0-alpha3,
compared to 1.4.1 it brings the following features:

Dropped support for PHP < 7
    
This means we now can use:
    
* scalar type hints
* return type hints
* callable type hint, without having to check PHP version
    
All `make` static constructor were created for PHP < 5.6, they're
now deprecated. Here's an example of what to use instead:
    
```
(new Method('sayHello'))
    ->addArgument(new Argument('string', 'name')))
;
```

## 2.0.0-alpha3: Return type hints

* added return type hints

## 2.0.0-alpha2: Fixes

* fixed PHPdoc return type hints

## 2.0.0-alpha1: PHP 7

Dropped support for PHP < 7
    
This means we now can use:
    
* scalar type hints
* return type hints
* callable type hint, without having to check PHP version
    
All `make` static constructor were created for PHP < 5.6, they're
now deprecated. Here's an example of what to use instead:
    
```
(new Method('sayHello'))
    ->addArgument(new Argument('string', 'name')))
;
```

## 1.4.1: Cancelled FQCN

* reverted the FQCN change

## 1.4.0: Improved FQCN

* improve `FullyQualifiedName` according to PHP Name resolution rules
* added support for PHP 7

## 1.3.5: Improved PHPdoc

* used `@return self`
* used `Objekt[]` when dealing with collections of objects

## 1.3.4: Fixed PHPdoc

* fixed PHPdoc

## 1.3.3: Fixed dependencies

* removed SpecGen to fix dependency cycles
* fixed CS

## 1.3.2: ParameterTag::make()

* fixed `ParameterTag#make`

## 1.3.1: SpecGen

* replaced phpspec extension with SpecGen

## 1.3.0: Argument type FQCN

* changed Argument.type to  be a Fully Qualified Class Name

## 1.2.0: @return and @throws PHPdoc tags

* added `return` PHPdoc tag
* added `throws` PHPdoc tag

## 1.1.0: Type name normalization

* integer, boolean and NULL will be normalized to int, bool and null

## 1.0.1: Small doc fixes

* fixed typos in documentation

## 1.0.0: Import

* imported models from [memio/memio](http://github.com/memio/memio) v1.0.0-rc7
