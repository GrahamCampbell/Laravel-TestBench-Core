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

use ArrayAccess;
use GrahamCampbell\TestBenchCore\Constraint\ArraySubset;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\InvalidArgumentException;
use PHPUnit\Runner\Version;
use PHPUnit\Util\InvalidArgumentHelper;

if (class_exists(Version::class) && version_compare(Version::id(), '8', '>=')) {
    /**
     * This is the array subset trait.
     *
     * @author Sebastian Bergmann <sebastian@phpunit.de>
     * @author Graham Campbell <hello@gjcampbell.co.uk>
     */
    trait ArraySubsetTrait
    {
        /**
         * Asserts that an array has a specified subset.
         *
         * @param \ArrayAccess|array $subset
         * @param \ArrayAccess|array $array
         * @param bool               $checkForIdentity
         * @param string             $msg
         *
         * @return void
         */
        public static function assertArraySubset($subset, $array, bool $checkForIdentity = false, string $msg = ''): void
        {
            if (!(is_array($subset) || $subset instanceof ArrayAccess)) {
                if (class_exists(InvalidArgumentException::class)) {
                    throw InvalidArgumentException::create(1, 'array or ArrayAccess');
                } else {
                    throw InvalidArgumentHelper::factory(1, 'array or ArrayAccess');
                }
            }

            if (!(is_array($array) || $array instanceof ArrayAccess)) {
                if (class_exists(InvalidArgumentException::class)) {
                    throw InvalidArgumentException::create(2, 'array or ArrayAccess');
                } else {
                    throw InvalidArgumentHelper::factory(2, 'array or ArrayAccess');
                }
            }

            $constraint = new ArraySubset($subset, $checkForIdentity);

            static::assertThat($array, $constraint, $msg);
        }
    }
} elseif (class_exists(Version::class) && version_compare(Version::id(), '7', '>=')) {
    /**
     * This is the array subset trait.
     *
     * @author Sebastian Bergmann <sebastian@phpunit.de>
     * @author Graham Campbell <hello@gjcampbell.co.uk>
     */
    trait ArraySubsetTrait
    {
        /**
         * Asserts that an array has a specified subset.
         *
         * @param \ArrayAccess|array $subset
         * @param \ArrayAccess|array $array
         * @param bool               $checkForIdentity
         * @param string             $msg
         *
         * @return void
         */
        public static function assertArraySubset($subset, $array, bool $checkForIdentity = false, string $msg = ''): void
        {
            Assert::assertArraySubset($subset, $array, $checkForIdentity, $msg);
        }
    }
} else {
    /**
     * This is the array subset trait.
     *
     * @author Sebastian Bergmann <sebastian@phpunit.de>
     * @author Graham Campbell <hello@gjcampbell.co.uk>
     */
    trait ArraySubsetTrait
    {
        /**
         * Asserts that an array has a specified subset.
         *
         * @param array|ArrayAccess $subset
         * @param array|ArrayAccess $array
         * @param bool              $strict
         * @param string            $msg
         *
         * @return void
         */
        public static function assertArraySubset($subset, $array, $strict = false, $msg = '')
        {
            Assert::assertArraySubset($subset, $array, $strict, $msg);
        }
    }
}
