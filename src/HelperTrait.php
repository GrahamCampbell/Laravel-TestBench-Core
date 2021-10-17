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

use InvalidArgumentException;

/**
 * This is the helper trait.
 *
 * @author Graham Campbell <hello@gjcampbell.co.uk>
 * @author Joseph Cohen <joseph.cohen@dinkbit.com>
 */
trait HelperTrait
{
    use ArraySubsetTrait;

    /**
     * Assert that the element exists in the array.
     *
     * @param mixed  $needle
     * @param array  $haystack
     * @param string $msg
     *
     * @return void
     */
    public static function assertInArray($needle, array $haystack, string $msg = '')
    {
        if ($msg === '') {
            $msg = "Expected the array to contain the element '$needle'.";
        }

        static::assertTrue(in_array($needle, $haystack, true), $msg);
    }

    /**
     * Assert that the specified method exists on the class.
     *
     * @param string $method
     * @param string $class
     * @param string $msg
     *
     * @return void
     */
    public static function assertMethodExists(string $method, string $class, string $msg = '')
    {
        if ($msg === '') {
            $msg = "Expected the class '$class' to have method '$method'.";
        }

        static::assertTrue(method_exists($class, $method), $msg);
    }

    /**
     * Assert that the element exists in the json.
     *
     * @param string $needle
     * @param array  $haystack
     * @param string $msg
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public static function assertInJson(string $needle, array $haystack, string $msg = '')
    {
        if ($msg === '') {
            $msg = "Expected the array to contain the element '$needle'.";
        }

        $array = json_decode($needle, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException("Invalid json provided: '$needle'.");
        }

        static::assertArraySubset($haystack, $array, false, $msg);
    }
}
