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

use GrahamCampbell\Analyzer\AnalysisTrait;
use GrahamCampbell\TestBenchCore\Constraint\ArraySubset;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Mockery;
use PHPUnit\Framework\InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\InvalidArgumentHelper;

/**
 * This is the analysis test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class AnalysisTest extends TestCase
{
    use AnalysisTrait;

    /**
     * Get the code paths to analyze.
     *
     * @return string[]
     */
    protected function getPaths()
    {
        return [
            realpath(__DIR__.'/../src'),
            realpath(__DIR__),
        ];
    }

    /**
     * Get the classes to ignore not existing.
     *
     * @return string[]
     */
    protected function getIgnored()
    {
        return [
            Application::class,
            ArraySubset::class,
            Facade::class,
            InvalidArgumentException::class,
            InvalidArgumentHelper::class,
            Mockery::class,
            ServiceProvider::class,
            Str::class,
        ];
    }
}
