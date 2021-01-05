<?php

namespace GregKos\GreekStrings\Tests;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function transliterate_a_greeting()
    {
        $transliterated = 'kalimera';

        $this->assertEquals('kalimera', $transliterated);
    }
}
