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

use Exception;
use Illuminate\Support\Str;

/**
 * This is the laravel trait.
 *
 * @author Graham Campbell <hello@gjcampbell.co.uk>
 */
trait LaravelTrait
{
    /**
     * Assert that a class can be automatically injected.
     *
     * @param string $name
     *
     * @return void
     */
    public function assertIsInjectable(string $name)
    {
        $injectable = true;

        $message = "The class '$name' couldn't be automatically injected.";

        try {
            $class = $this->makeInjectableClass($name);
            $this->assertInstanceOf($name, $class->getInjectedObject());
        } catch (Exception $e) {
            $injectable = false;
            if ($msg = $e->getMessage()) {
                $message .= " $msg";
            }
        }

        $this->assertTrue($injectable, $message);
    }

    /**
     * Register and make a stub class to inject into.
     *
     * @param string $name
     *
     * @return object
     */
    protected function makeInjectableClass(string $name)
    {
        do {
            $class = 'testBenchStub'.Str::random();
        } while (class_exists($class));

        eval("
            class $class
            {
                protected \$object;

                public function __construct(\\$name \$object)
                {
                    \$this->object = \$object;
                }

                public function getInjectedObject()
                {
                    return \$this->object;
                }
            }
        ");

        return $this->app->make($class);
    }
}
