Laravel TestBench Core
======================

Laravel TestBench Core was created by, and is maintained by [Graham Campbell](https://github.com/GrahamCampbell), and provides some testing functionality for [Laravel](https://laravel.com/). Feel free to check out the [change log](CHANGELOG.md), [releases](https://github.com/GrahamCampbell/Laravel-TestBench-Core/releases), [security policy](https://github.com/GrahamCampbell/Laravel-TestBench-Core/security/policy), [license](LICENSE), [code of conduct](.github/CODE_OF_CONDUCT.md), and [contribution guidelines](.github/CONTRIBUTING.md).

![Banner](https://user-images.githubusercontent.com/2829600/71477508-68a5a600-27e2-11ea-91c9-da343f90b279.png)

<p align="center">
<a href="https://github.com/GrahamCampbell/Laravel-TestBench-Core/actions?query=workflow%3ATests"><img src="https://img.shields.io/github/actions/workflow/status/GrahamCampbell/Laravel-TestBench-Core/tests.yml?label=Tests&style=flat-square" alt="Build Status"></img></a>
<a href="https://github.styleci.io/repos/37913000"><img src="https://github.styleci.io/repos/37913000/shield" alt="StyleCI Status"></img></a>
<a href="LICENSE"><img src="https://img.shields.io/badge/license-MIT-brightgreen?style=flat-square" alt="Software License"></img></a>
<a href="https://packagist.org/packages/graham-campbell/testbench-core"><img src="https://img.shields.io/packagist/dt/graham-campbell/testbench-core?style=flat-square" alt="Packagist Downloads"></img></a>
<a href="https://github.com/GrahamCampbell/Laravel-TestBench-Core/releases"><img src="https://img.shields.io/github/release/GrahamCampbell/Laravel-TestBench-Core?style=flat-square" alt="Latest Version"></img></a>
</p>


## Installation

This version requires [PHP](https://www.php.net/) 7.0-8.1 and supports [PHPUnit](https://phpunit.de/) 6-9 and [Laravel](https://laravel.com/) 5.5-9.

| TestBench Core | L5.1               | L5.2               | L5.3               | L5.4               | L5.5               | L5.6               | L5.7               | L5.8               | L6                 | L7                 | L8                 | L9                 |
|----------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|
| 1.1            | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :x:                | :x:                | :x:                | :x:                | :x:                | :x:                | :x:                | :x:                |
| 2.0            | :x:                | :x:                | :x:                | :x:                | :white_check_mark: | :x:                | :x:                | :x:                | :x:                | :x:                | :x:                | :x:                |
| 3.4            | :x:                | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: |

| TestBench Core | PHPUnit 4.8        | PHPUnit 5          | PHPUnit 6          | PHPUnit 7          | PHPUnit 8          | PHPUnit 9          |
|----------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|
| 1.1            | :white_check_mark: | :white_check_mark: | :x:                | :x:                | :x:                | :x:                |
| 2.0            | :x:                | :x:                | :white_check_mark: | :x:                | :x:                | :x:                |
| 3.4            | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: |

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require "graham-campbell/testbench-core:^3.4" --dev
```

Once installed, you can extend or implement the classes in this package, or packages required by this package. There are no service providers to register.


## Configuration

Laravel TestBench Core requires no configuration. Just follow the simple install instructions and go!


## Usage

You may see an example of implementation in pretty much all of my Laravel packages.


## Security

If you discover a security vulnerability within this package, please send an email to security@tidelift.com. All security vulnerabilities will be promptly addressed. You may view our full security policy [here](https://github.com/GrahamCampbell/Laravel-TestBench-Core/security/policy).


## License

Laravel TestBench Core is licensed under [The MIT License (MIT)](LICENSE).


## For Enterprise

Available as part of the Tidelift Subscription

The maintainers of `graham-campbell/testbench-core` and thousands of other packages are working with Tidelift to deliver commercial support and maintenance for the open source dependencies you use to build your applications. Save time, reduce risk, and improve code health, while paying the maintainers of the exact dependencies you use. [Learn more.](https://tidelift.com/subscription/pkg/packagist-graham-campbell-testbench-core?utm_source=packagist-graham-campbell-testbench-core&utm_medium=referral&utm_campaign=enterprise&utm_term=repo)
