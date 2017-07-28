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

use PHPUnit\Framework\TestCase;

/**
 * This is the helpers test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class BCTest extends TestCase
{
    public function testLegacyExists()
    {
        $this->assertTrue(class_exists(\PHPUnit_Framework_TestCase::class));
    }
}
