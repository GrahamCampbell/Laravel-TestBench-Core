<?php

declare(strict_types=1);

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <hello@gjcampbell.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Tests\TestBenchCore;

use GrahamCampbell\TestBenchCore\HelperTrait;
use InvalidArgumentException;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use TypeError;

class HelpersTest extends TestCase
{
    use HelperTrait;

    public function testInArray()
    {
        self::assertInArray('foo', ['foo']);
    }

    public function testNotInArray()
    {
        self::expectException(ExpectationFailedException::class);
        self::assertInArray('foo', ['bar']);
    }

    public function testMethodDoesExist()
    {
        self::assertMethodExists('getBar', FooStub::class);
    }

    public function testMethodDoesNotExist()
    {
        self::expectException(ExpectationFailedException::class);
        self::assertMethodExists('getFoo', FooStub::class);
    }

    public function testInJson()
    {
        self::assertInJson('{"foo":"bar"}', ['foo' => 'bar']);
        self::assertInJson('{ "foo": "bar", "bar": "baz" }', ['foo' => 'bar']);
        self::assertInJson('{ "foo": "bar", "bar": "baz" }', ['bar' => 'baz']);
    }

    public function testNotInJsonOne()
    {
        self::expectException(ExpectationFailedException::class);
        self::assertInJson('{"foo":"baz"}', ['foo' => 'bar']);
    }

    public function testNotInJsonTwo()
    {
        self::expectException(ExpectationFailedException::class);
        self::assertInJson('{ "foo": "bar", "bar": "baz" }', ['foo' => 'baz']);
    }

    public function testBadJsonInNotInJson()
    {
        self::expectException(InvalidArgumentException::class);
        self::assertInJson('foobar', ['foo' => 'bar']);
    }

    public function testAssertArraySubsetBadArg1()
    {
        $this->expectException(TypeError::class);

        self::assertArraySubset(123, []);
    }

    public function testAssertArraySubsetBadArg2()
    {
        $this->expectException(TypeError::class);

        self::assertArraySubset([], 123);
    }
}

class FooStub
{
    protected $bar;

    public function __construct($bar)
    {
        $this->bar = $bar;
    }

    public function getBar()
    {
        return $this->bar;
    }
}

class BarStub
{
    protected $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    public function getFoo()
    {
        return $this->foo;
    }
}
