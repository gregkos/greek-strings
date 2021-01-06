<?php

namespace GregKos\GreekStrings\Tests;

use GregKos\GreekStrings\GreekString;
use PHPUnit\Framework\TestCase;

class IntegrityTest extends TestCase
{
    /** @test */
    public function it_can_create_an_empty_instance()
    {
        $greek_string = new GreekString;

        $this->assertInstanceOf(GreekString::class, $greek_string);
    }

    /** @test */
    public function it_can_get_the_original_string()
    {
        $greek_string = new GreekString('καλημέρα');

        $this->assertEquals('καλημέρα', $greek_string->getString());
    }

    /** @test */
    public function it_can_set_the_string_after_instantiation()
    {
        // instantiate as empty
        $greek_string = new GreekString;
        $this->assertEquals('', $greek_string->getString());
        // set from empty
        $greek_string->setString('καλημέρα');
        $this->assertEquals('καλημέρα', $greek_string->getString());
        // replace previous string
        $greek_string->setString('αντίο');
        $this->assertEquals('αντίο', $greek_string->getString());
    }

    /** @test */
    public function it_can_chain_the_setter()
    {
        $this->assertEquals('καλημέρα', (new GreekString)->setString('καλημέρα')->getString());
    }
}
