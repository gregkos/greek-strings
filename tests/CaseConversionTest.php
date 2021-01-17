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

    /** @test */
    public function convert_a_greeting_without_removing_accent()
    {
        $converted = (new GreekString('ΚΑΛΗΜΈΡΑ'))->toLower(false);

        $this->assertEquals('καλημέρα', $converted);
    }

    /**
     * @test
     * @dataProvider conversionExamplesProvider
     */
    public function convert_various_strings($original, $upper, $lower, $upperWithAccent, $lowerWithAccent)
    {
        $this->assertEquals($upper, (new GreekString($original))->toUpper());
        $this->assertEquals($lower, (new GreekString($original))->toLower());
        $this->assertEquals($upperWithAccent, (new GreekString($original))->toUpper(false));
        $this->assertEquals($lowerWithAccent, (new GreekString($original))->toLower(false));
    }

    public function conversionExamplesProvider(): array
    {
        return [
            ['', '', '', '', ''],
            ['αρχικό', 'ΑΡΧΙΚΟ', 'αρχικο', 'ΑΡΧΙΚΌ', 'αρχικό'],
            ['διεκπαιρέωση', 'ΔΙΕΚΠΑΙΡΕΩΣΗ', 'διεκπαιρεωση', 'ΔΙΕΚΠΑΙΡΈΩΣΗ', 'διεκπαιρέωση'],
            ['κεφαλαιοποίηση', 'ΚΕΦΑΛΑΙΟΠΟΙΗΣΗ', 'κεφαλαιοποιηση', 'ΚΕΦΑΛΑΙΟΠΟΊΗΣΗ', 'κεφαλαιοποίηση'],
            ['Αύγουστος', 'ΑΥΓΟΥΣΤΟΣ', 'αυγουστος', 'ΑΎΓΟΥΣΤΟΣ', 'αύγουστος'],
            ['Μαΐου', 'ΜΑΙΟΥ', 'μαιου', 'ΜΑΪ́ΟΥ', 'μαΐου'],
            ['ενσυναίσθηση', 'ΕΝΣΥΝΑΙΣΘΗΣΗ', 'ενσυναισθηση', 'ΕΝΣΥΝΑΊΣΘΗΣΗ', 'ενσυναίσθηση'],
            ['προϋπάρχον', 'ΠΡΟΥΠΑΡΧΟΝ', 'προυπαρχον', 'ΠΡΟΫΠΆΡΧΟΝ', 'προϋπάρχον'],
            ['προκατάληψη', 'ΠΡΟΚΑΤΑΛΗΨΗ', 'προκαταληψη', 'ΠΡΟΚΑΤΆΛΗΨΗ', 'προκατάληψη'],
            ['ψυγείο', 'ΨΥΓΕΙΟ', 'ψυγειο', 'ΨΥΓΕΊΟ', 'ψυγείο'],
            ['Δευτέρα', 'ΔΕΥΤΕΡΑ', 'δευτερα', 'ΔΕΥΤΈΡΑ', 'δευτέρα'],
            ['Ταχίστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός.', 'ΤΑΧΙΣΤΗ ΑΛΩΠΗΞ ΒΑΦΗΣ ΨΗΜΕΝΗ ΓΗ, ΔΡΑΣΚΕΛΙΖΕΙ ΥΠΕΡ ΝΩΘΡΟΥ ΚΥΝΟΣ.', 'ταχιστη αλωπηξ βαφης ψημενη γη, δρασκελιζει υπερ νωθρου κυνος.', 'ΤΑΧΊΣΤΗ ΑΛΏΠΗΞ ΒΑΦΉΣ ΨΗΜΈΝΗ ΓΗ, ΔΡΑΣΚΕΛΊΖΕΙ ΥΠΈΡ ΝΩΘΡΟΎ ΚΥΝΌΣ.', 'ταχίστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός.'],
            ['Ξεσκεπάζω την ψυχοφθόρα βδελυγμία.', 'ΞΕΣΚΕΠΑΖΩ ΤΗΝ ΨΥΧΟΦΘΟΡΑ ΒΔΕΛΥΓΜΙΑ.', 'ξεσκεπαζω την ψυχοφθορα βδελυγμια.', 'ΞΕΣΚΕΠΆΖΩ ΤΗΝ ΨΥΧΟΦΘΌΡΑ ΒΔΕΛΥΓΜΊΑ.', 'ξεσκεπάζω την ψυχοφθόρα βδελυγμία.'],
        ];
    }
}
