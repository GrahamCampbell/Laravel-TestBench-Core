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
use TypeError;

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
            throw new TypeError(
                sprintf('%s(): Argument #1 ($subset) must be of type array|ArrayAccess, %s given', __METHOD__, get_debug_type($subset)),
            );
        }

        if (!(is_array($array) || $array instanceof ArrayAccess)) {
            throw new TypeError(
                sprintf('%s(): Argument #2 ($array) must be of type array|ArrayAccess, %s given', __METHOD__, get_debug_type($array)),
            );
        }

        $constraint = new ArraySubset($subset, $checkForIdentity);

        static::assertThat($array, $constraint, $msg);
    }
}
