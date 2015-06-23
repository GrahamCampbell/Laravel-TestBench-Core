<?php

/*
 * This file is part of Laravel TestBench Core.
 *
 * (c) Graham Campbell <graham@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\TestBenchCore;

use PHPUnit_Framework_TestCase as TestCase;

/**
 * This is the abstract test case class.
 *
 * @author Graham Campbell <graham@cachethq.io>
 */
abstract class AbstractTestCase extends TestCase
{
    use HelperTrait, MockeryTrait;
}
