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

    /** @test */
    public function transliterate_a_mixed_string()
    {
        $transliterated = (new GreekString('Καλημέρα Bob!'))->transliterate();

        $this->assertEquals('Kalimera Bob!', $transliterated);
    }

    /**
     * @test
     * @dataProvider transliterationExamplesProvider
     */
    public function transliterate_various_strings($original, $transliterated)
    {
        $this->assertEquals($transliterated, (new GreekString($original))->transliterate());
    }

    public function transliterationExamplesProvider(): array
    {
        return [
            ['', ''],
            ['αρχικό', 'archiko'],
            ['διεκπαιρέωση', 'diekpaireosi'],
            ['κεφαλαιοποίηση', 'kefalaiopoiisi'],
            ['Αύγουστος', 'Avgoustos'],
            ['Μαΐου', 'Maiou'],
            ['ενσυναίσθηση', 'ensynaisthisi'],
            ['προϋπάρχον', 'proyparchon'],
            ['προκατάληψη', 'prokatalipsi'],
            ['ψυγείο', 'psygeio'],
            ['Δευτέρα', 'Deftera'],
            ['Ταχίστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός.', 'Tachisti alopix vafis psimeni gi, draskelizei yper nothrou kynos.'],
            ['Ξεσκεπάζω την ψυχοφθόρα βδελυγμία.', 'Xeskepazo tin psychofthora vdelygmia.'],
        ];
    }
}
