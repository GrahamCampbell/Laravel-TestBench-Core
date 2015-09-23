<?php

/*
 * This file is part of Laravel TestBench Core.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\TestBenchCore;

use Illuminate\Support\ServiceProvider;
use ReflectionClass;

/**
 * This is the service orovider test case trait.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
trait ServiceProviderTrait
{
    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    abstract protected function getServiceProviderClass($app);

    public function testIsAServiceProvider()
    {
        $class = $this->getServiceProviderClass($this->app);

        $reflection = new ReflectionClass($class);

        $provider = new ReflectionClass(ServiceProvider::class);

        $msg = "Expected class '$class' to be a service provider.";

        $this->assertTrue($reflection->isSubclassOf($provider), $msg);
    }

    public function testProvides()
    {
        $class = $this->getServiceProviderClass($this->app);
        $reflection = new ReflectionClass($class);

        $method = $reflection->getMethod('provides');
        $method->setAccessible(true);

        $msg = "Expected class '$class' to provide a valid list of services.";

        $this->assertInternalType('array', $method->invoke(new $class($this->app)), $msg);
    }
}
