<?php

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2017 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare (strict_types = 1);

namespace UnitConverter\Tests\Integration\Unit\Volume;

use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Volume\Litre;
use UnitConverter\Unit\Volume\Mililitre;
use UnitConverter\Unit\Volume\Gallon;
use UnitConverter\Unit\Volume\Pint;

/**
 * Test the default volume units for conversion accuracy.
 */
class VolumeUnitsSpec extends TestCase
{
    protected function setUp ()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry(array(
                new Litre,
                new Mililitre,
                new Gallon,
                new Pint,
            )),
            new SimpleCalculator
        );
    }

    protected function tearDown ()
    {
        unset($this->converter);
    }

    /**
     * @test
     * @coversNothing
     */
    public function assert ()
    {
        $expected = 4.73176;
        $actual = $this->converter
            ->convert(10, 5)
            ->from("pt")
            ->to("l")
            ;

        $this->assertEquals($expected, $actual);
    }
}
