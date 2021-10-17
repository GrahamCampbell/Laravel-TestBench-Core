<?php

declare(strict_types=1);

/*
 * This file is part of Laravel TestBench Core.
 *
 * (c) Graham Campbell <hello@gjcampbell.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\TestBenchCore;

use Mockery;

/**
 * This is the mockery trait.
 *
 * @author Graham Campbell <hello@gjcampbell.co.uk>
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
        if (class_exists(Mockery::class, false)) {
            $container = Mockery::getContainer();

            if ($container) {
                $this->addToAssertionCount($container->mockery_getExpectationCount());
            }

            Mockery::close();
        }
    }
}
