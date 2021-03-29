<?php

declare(strict_types=1);

/*
 * This file is part of Laravel TestBench Core.
 *
 * (c) Graham Campbell <graham@alt-three.com>
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
 * @author Graham Campbell <graham@alt-three.com>
 */
trait FacadeTrait
{
    use HelperTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    abstract protected function getFacadeAccessor();

    /**
     * Get the facade class.
     *
     * @return string
     */
    abstract protected function getFacadeClass();

    /**
     * Get the facade root.
     *
     * @return string
     */
    abstract protected function getFacadeRoot();

    /**
     * Get the service provider class.
     *
     * @return string
     */
    abstract protected function getServiceProviderClass();

    public function testIsAFacade()
    {
        $class = $this->getFacadeClass();
        $reflection = new ReflectionClass($class);
        $facade = new ReflectionClass(Facade::class);

        $msg = "Expected class '$class' to be a facade.";

        $this->assertTrue($reflection->isSubclassOf($facade), $msg);
    }

    public function testFacadeAccessor()
    {
        $accessor = $this->getFacadeAccessor();
        $class = $this->getFacadeClass();
        $reflection = new ReflectionClass($class);
        $method = $reflection->getMethod('getFacadeAccessor');
        $method->setAccessible(true);

        $msg = "Expected class '$class' to have an accessor of '$accessor'.";

        $this->assertSame($accessor, $method->invoke(null), $msg);
    }

    public function testFacadeRoot()
    {
        $root = $this->getFacadeRoot();
        $class = $this->getFacadeClass();
        $reflection = new ReflectionClass($class);
        $method = $reflection->getMethod('getFacadeRoot');
        $method->setAccessible(true);

        $msg = "Expected class '$class' to have a root of '$root'.";

        $this->assertInstanceOf($root, $method->invoke(null), $msg);
    }

    public function testServiceProvider()
    {
        $accessor = $this->getFacadeAccessor();
        $provider = $this->getServiceProviderClass($this->app);

        if ($provider) {
            $reflection = new ReflectionClass($provider);
            $method = $reflection->getMethod('provides');
            $method->setAccessible(true);

            $msg = "Expected class '$provider' to provide '$accessor'.";

            $this->assertInArray($accessor, $method->invoke(new $provider($this->app)), $msg);
        }
    }
}
