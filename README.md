# filter-bools-php

[![Build Status](https://travis-ci.org/traderinteractive/filter-bools-php.svg?branch=master)](https://travis-ci.org/traderinteractive/filter-bools-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/traderinteractive/filter-bools-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/traderinteractive/filter-bools-php/?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/traderinteractive/filter-bools-php/badge.svg?branch=master)](https://coveralls.io/github/traderinteractive/filter-bools-php?branch=master)

[![Latest Stable Version](https://poser.pugx.org/traderinteractive/filter-bools/v/stable)](https://packagist.org/packages/traderinteractive/filter-bools)
[![Latest Unstable Version](https://poser.pugx.org/traderinteractive/filter-bools/v/unstable)](https://packagist.org/packages/traderinteractive/filter-bools)
[![License](https://poser.pugx.org/traderinteractive/filter-bools/license)](https://packagist.org/packages/traderinteractive/filter-bools)

[![Total Downloads](https://poser.pugx.org/traderinteractive/filter-bools/downloads)](https://packagist.org/packages/traderinteractive/filter-bools)
[![Daily Downloads](https://poser.pugx.org/traderinteractive/filter-bools/d/daily)](https://packagist.org/packages/traderinteractive/filter-bools)
[![Monthly Downloads](https://poser.pugx.org/traderinteractive/filter-bools/d/monthly)](https://packagist.org/packages/traderinteractive/filter-bools)

A filtering implementation for verifying correct data and performing typical modifications to data.

## Requirements

Requires PHP 7.0 or newer and uses composer to install further PHP dependencies.  See the [composer specification](composer.json) for more details.

## Composer

To add the library as a local, per-project dependency use [Composer](http://getcomposer.org)! Simply add a dependency on
`traderinteractive/filter-bools` to your project's `composer.json` file such as:

```sh
composer require traderinteractive/filter-bools
```

### Functionality

#### Booleans::filter

This filter verifies that the argument is a boolean value or a string that maps to one.  The second parameter
can be set to `true` to allow null values through without an error (they will stay null and not get converted to false).  The last parameters
are lists of strings for true values and false values.  By default, the strings "true" and "false" map to their boolean counterparts.

The following example converts `$value` to a boolean allowing the strings "on" and "of".

```php
$enabled = \TraderInteractive\Filter\Booleans::filter($value, false, ['on'], ['off']);
```

#### Booleans::convert

This filter will convert a given boolean value into the provided true or false conditions. By default the
return values are the strings 'true' and 'false'

The following converts the boolean `$value` to either 'yes' or 'no'

```php
$answer = \TraderInteractive\Filter\Booleans::convert($value, 'yes', 'no');
```

## Contact

Developers may be contacted at:

 * [Pull Requests](https://github.com/traderinteractive/filter-bools-php/pulls)
 * [Issues](https://github.com/traderinteractive/filter-bools-php/issues)

## Project Build

With a checkout of the code get [Composer](http://getcomposer.org) in your PATH and run:

```bash
composer install
./vendor/bin/phpcs
./vendor/bin/phpunit
```

For more information on our build process, read through out our [Contribution Guidelines](CONTRIBUTING.md).
