<?php

namespace GregKos\GreekStrings\Tests;

use GregKos\GreekStrings\GreekString;
use PHPUnit\Framework\TestCase;

class TransliterationTest extends TestCase
{
    /** @test */
    public function transliterate_a_greeting()
    {
        $transliterated = (new GreekString('καλημέρα'))->transliterate();

        $this->assertEquals('kalimera', $transliterated);
    }
}
