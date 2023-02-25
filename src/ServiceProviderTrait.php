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

use Illuminate\Support\ServiceProvider;
use PHPUnit\Framework\Assert;
use ReflectionClass;

/**
 * This is the service orovider test case trait.
 *
 * @author Graham Campbell <hello@gjcampbell.co.uk>
 */
trait ServiceProviderTrait
{
    /**
     * Get the service provider class.
     *
     * @return string
     */
    abstract protected static function getServiceProviderClass(): string;

    public function testIsAServiceProvider(): void
    {
        $class = static::getServiceProviderClass();

        $reflection = new ReflectionClass($class);

        $provider = new ReflectionClass(ServiceProvider::class);

        $msg = "Expected class '$class' to be a service provider.";

        static::assertTrue($reflection->isSubclassOf($provider), $msg);
    }

    public function testProvides(): void
    {
        $class = static::getServiceProviderClass();
        $reflection = new ReflectionClass($class);

        $method = $reflection->getMethod('provides');
        $method->setAccessible(true);

        $msg = "Expected class '$class' to provide a valid list of services.";

        if (is_callable([Assert::class, 'assertIsArray'])) {
            static::assertIsArray($method->invoke(new $class($this->app)), $msg);
        } else {
            static::assertInternalType('array', $method->invoke(new $class($this->app)), $msg);
        }
    }
}
