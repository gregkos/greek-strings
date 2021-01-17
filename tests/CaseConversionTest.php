<?php

namespace GregKos\GreekStrings\Tests;

use GregKos\GreekStrings\GreekString;
use PHPUnit\Framework\TestCase;

class CaseConversionTest extends TestCase
{
    /** @test */
    public function convert_a_greeting_to_uppercase()
    {
        $converted = (new GreekString('καλημέρα'))->toUpper();

        $this->assertEquals('ΚΑΛΗΜΕΡΑ', $converted);
    }

    /** @test */
    public function convert_a_greeting_to_lowercase()
    {
        $converted = (new GreekString('ΚΑΛΗΜΕΡΑ'))->toLower();

        $this->assertEquals('καλημερα', $converted);
    }
}
