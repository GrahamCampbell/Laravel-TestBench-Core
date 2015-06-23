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

use Mockery;

/**
 * This is the mockery trait.
 *
 * @author Graham Campbell <graham@cachethq.io>
 */
trait MockeryTrait
{
    /**
     * Tear down mockery.
     *
     * @after
     *
     * @return void
     */
    public function tearDownMockery()
    {
        if ($container = Mockery::getContainer()) {
            $this->addToAssertionCount($container->mockery_getExpectationCount());
        }

        Mockery::close();
    }
}
