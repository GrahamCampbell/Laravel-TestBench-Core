<?php

declare(strict_types=1);

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Tests\TestBenchCore;

use GrahamCampbell\TestBenchCore\HelperTrait;
use PHPUnit\Framework\TestCase;

/**
 * This is the helpers test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class HelpersTest extends TestCase
{
    use HelperTrait;

    public function testInArray()
    {
        $this->assertInArray('foo', ['foo']);
    }

    /**
     * @expectedException PHPUnit\Framework\ExpectationFailedException
     */
    public function testNotInArray()
    {
        $this->assertInArray('foo', ['bar']);
    }

    public function testMethodDoesExist()
    {
        $this->assertMethodExists('getBar', FooStub::class);
    }

    /**
     * @expectedException PHPUnit\Framework\ExpectationFailedException
     */
    public function testMethodDoesNotExist()
    {
        $this->assertMethodExists('getFoo', FooStub::class);
    }

    public function testInJson()
    {
        $this->assertInJson('{"foo":"bar"}', ['foo' => 'bar']);
        $this->assertInJson('{ "foo": "bar", "bar": "baz" }', ['foo' => 'bar']);
        $this->assertInJson('{ "foo": "bar", "bar": "baz" }', ['bar' => 'baz']);
    }

    /**
     * @expectedException PHPUnit\Framework\ExpectationFailedException
     */
    public function testNotInJson()
    {
        $this->assertInJson('{"foo":"baz"}', ['foo' => 'bar']);
        $this->assertInJson('{ "foo": "bar", "bar": "baz" }', ['foo' => 'baz']);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBadJsonInNotInJson()
    {
        $this->assertInJson('foobar', ['foo' => 'bar']);
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
