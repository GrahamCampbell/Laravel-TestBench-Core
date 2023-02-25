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

use Illuminate\Support\Facades\Facade;
use ReflectionClass;

/**
 * This is the facade trait.
 *
 * @author Graham Campbell <hello@gjcampbell.co.uk>
 */
trait FacadeTrait
{
    use HelperTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    abstract protected static function getFacadeAccessor();

    /**
     * Get the facade class.
     *
     * @return string
     */
    abstract protected static function getFacadeClass();

    /**
     * Get the facade root.
     *
     * @return string
     */
    abstract protected static function getFacadeRoot();

    /**
     * Get the service provider class.
     *
     * @return string
     */
    abstract protected static function getServiceProviderClass();

    public function testIsAFacade()
    {
        $class = static::getFacadeClass();
        $reflection = new ReflectionClass($class);
        $facade = new ReflectionClass(Facade::class);

        $msg = "Expected class '$class' to be a facade.";

        static::assertTrue($reflection->isSubclassOf($facade), $msg);
    }

    public function testFacadeAccessor()
    {
        $accessor = static::getFacadeAccessor();
        $class = static::getFacadeClass();
        $reflection = new ReflectionClass($class);
        $method = $reflection->getMethod('getFacadeAccessor');
        $method->setAccessible(true);

        $msg = "Expected class '$class' to have an accessor of '$accessor'.";

        static::assertSame($accessor, $method->invoke(null), $msg);
    }

    public function testFacadeRoot()
    {
        $root = static::getFacadeRoot();
        $class = static::getFacadeClass();
        $reflection = new ReflectionClass($class);
        $method = $reflection->getMethod('getFacadeRoot');
        $method->setAccessible(true);

        $msg = "Expected class '$class' to have a root of '$root'.";

        static::assertInstanceOf($root, $method->invoke(null), $msg);
    }

    public function testServiceProvider()
    {
        $accessor = static::getFacadeAccessor();
        $provider = static::getServiceProviderClass($this->app);

        if ($provider) {
            $reflection = new ReflectionClass($provider);
            $method = $reflection->getMethod('provides');
            $method->setAccessible(true);

            $msg = "Expected class '$provider' to provide '$accessor'.";

            static::assertInArray($accessor, $method->invoke(new $provider($this->app)), $msg);
        }
    }
}
