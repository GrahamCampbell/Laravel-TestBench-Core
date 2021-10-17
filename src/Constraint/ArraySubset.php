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

namespace GrahamCampbell\TestBenchCore\Constraint;

if (PHP_VERSION_ID >= 70100) {
    require_once __DIR__.DIRECTORY_SEPARATOR.'ArraySubset.internal';
}
