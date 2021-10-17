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

use Exception;
use GrahamCampbell\TestBenchCore\HelperTrait;
use InvalidArgumentException;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    use HelperTrait;

    public function testInArray()
    {
        $this->assertInArray('foo', ['foo']);
    }

    public function testNotInArray()
    {
        $this->expectException(ExpectationFailedException::class);
        $this->assertInArray('foo', ['bar']);
    }

    public function testMethodDoesExist()
    {
        $this->assertMethodExists('getBar', FooStub::class);
    }

    public function testMethodDoesNotExist()
    {
        $this->expectException(ExpectationFailedException::class);
        $this->assertMethodExists('getFoo', FooStub::class);
    }

    public function testInJson()
    {
        $this->assertInJson('{"foo":"bar"}', ['foo' => 'bar']);
        $this->assertInJson('{ "foo": "bar", "bar": "baz" }', ['foo' => 'bar']);
        $this->assertInJson('{ "foo": "bar", "bar": "baz" }', ['bar' => 'baz']);
    }

    public function testNotInJsonOne()
    {
        $this->expectException(ExpectationFailedException::class);
        $this->assertInJson('{"foo":"baz"}', ['foo' => 'bar']);
    }

    public function testNotInJsonTwo()
    {
        $this->expectException(ExpectationFailedException::class);
        $this->assertInJson('{ "foo": "bar", "bar": "baz" }', ['foo' => 'baz']);
    }

    public function testBadJsonInNotInJson()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->assertInJson('foobar', ['foo' => 'bar']);
    }

    public function testAssertArraySubsetBadArg1()
    {
        try {
            $this->assertArraySubset(123, []);
        } catch (Exception $e) {
            $this->assertInArray($e->getMessage(), [
                'Argument #1 of GrahamCampbell\Tests\TestBenchCore\HelpersTest::assertArraySubset() must be an array or ArrayAccess',
                'Argument #1 (No Value) of GrahamCampbell\Tests\TestBenchCore\HelpersTest::assertArraySubset() must be a array or ArrayAccess',
                'Argument #1 (No Value) of PHPUnit\Framework\Assert::assertArraySubset() must be a array or ArrayAccess',
            ]);

            return;
        }

        $this->assertTrue(false);
    }

    public function testAssertArraySubsetBadArg2()
    {
        try {
            $this->assertArraySubset([], 123);
        } catch (Exception $e) {
            $this->assertInArray($e->getMessage(), [
                'Argument #2 of GrahamCampbell\Tests\TestBenchCore\HelpersTest::assertArraySubset() must be an array or ArrayAccess',
                'Argument #2 (No Value) of GrahamCampbell\Tests\TestBenchCore\HelpersTest::assertArraySubset() must be a array or ArrayAccess',
                'Argument #2 (No Value) of PHPUnit\Framework\Assert::assertArraySubset() must be a array or ArrayAccess',
            ]);

            return;
        }

        $this->assertTrue(false);
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
