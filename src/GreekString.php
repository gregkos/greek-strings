<?php

namespace GregKos\GreekStrings;

class GreekString
{
    private string $string;

    //
    // arrays for transliteration
    //

    //difthongs
    protected $el_difthongs = [
        'αι|αί', 'οι|οί', 'ου|ού', 'ει|εί', 'ντ', 'τσ', 'τζ', 'γγ', 'γκ', 'γχ', 'γξ', 'θ', 'χ', 'ψ',
        'ΑΙ|ΑΊ', 'ΟΙ|ΟΊ', 'ΟΥ|ΟΎ', 'ΕΙ|ΕΊ', 'ΝΤ', 'ΤΣ', 'ΤΖ', 'ΓΓ', 'ΓΚ', 'ΓΧ', 'ΓΞ', 'Θ', 'Χ', 'Ψ',
        'Αι|Αί', 'Οι|Οί', 'Ου|Ού', 'Ει|Εί', 'Ντ', 'Τσ', 'Τζ', 'Γγ', 'Γκ', 'Γχ', 'Γξ',
        'αΙ|αΊ', 'οΙ|οΊ', 'οΥ|οΎ', 'εΙ|εΊ', 'νΤ', 'τΣ', 'τΖ', 'γΓ', 'γΚ', 'γΧ', 'γΞ',
    ];
    protected $lat_difthongs = [
        'ai', 'oi', 'ou', 'ei', 'nt', 'ts', 'tz', 'ng', 'gk', 'nch', 'nx', 'th', 'ch', 'ps',
        'AI', 'OI', 'OU', 'EI', 'NT', 'TS', 'TZ', 'NG', 'GK', 'NCH', 'NX', 'TH', 'CH', 'PS',
        'Ai', 'Oi', 'Ou', 'Ei', 'Nt', 'Ts', 'Tz', 'Ng', 'Gk', 'Nch', 'Nx',
        'aI', 'oI', 'oU', 'eI', 'nT', 'tS', 'tZ', 'nG', 'gK', 'nCH', 'nX',
    ];

    //*υ difthongs case, if followed by letters at pos 1-3 converted to *f, else to *v
    protected $el_spec_difthongs = [
        '(α[υ|ύ])(?![α|ά|β|γ|δ|ε|έ|ζ|η|ή|λ|ι|ί|ϊ|ΐ|μ|ν|ο|ό|ρ|ω|ώ|Α|Ά|Β|Γ|Δ|Ε|Έ|Ζ|Η|Ή|Λ|Ι|Ί|Ϊ|Μ|Ν|Ο|Ό|Ρ|Ω|Ώ|])',
        '(ε[υ|ύ])(?![α|ά|β|γ|δ|ε|έ|ζ|η|ή|λ|ι|ί|ϊ|ΐ|μ|ν|ο|ό|ρ|ω|ώ|Α|Ά|Β|Γ|Δ|Ε|Έ|Ζ|Η|Ή|Λ|Ι|Ί|Ϊ|Μ|Ν|Ο|Ό|Ρ|Ω|Ώ|])',
        '(η[υ|ύ])(?![α|ά|β|γ|δ|ε|έ|ζ|η|ή|λ|ι|ί|ϊ|ΐ|μ|ν|ο|ό|ρ|ω|ώ|Α|Ά|Β|Γ|Δ|Ε|Έ|Ζ|Η|Ή|Λ|Ι|Ί|Ϊ|Μ|Ν|Ο|Ό|Ρ|Ω|Ώ|])',
        '(α[υ|ύ])',
        '(ε[υ|ύ])',
        '(η[υ|ύ])',
        '(Α[Υ|Ύ])(?![α|ά|β|γ|δ|ε|έ|ζ|η|ή|λ|ι|ί|ϊ|ΐ|μ|ν|ο|ό|ρ|ω|ώ|Α|Ά|Β|Γ|Δ|Ε|Έ|Ζ|Η|Ή|Λ|Ι|Ί|Ϊ|Μ|Ν|Ο|Ό|Ρ|Ω|Ώ|])',
        '(Ε[Υ|Ύ])(?![α|ά|β|γ|δ|ε|έ|ζ|η|ή|λ|ι|ί|ϊ|ΐ|μ|ν|ο|ό|ρ|ω|ώ|Α|Ά|Β|Γ|Δ|Ε|Έ|Ζ|Η|Ή|Λ|Ι|Ί|Ϊ|Μ|Ν|Ο|Ό|Ρ|Ω|Ώ|])',
        '(Η[Υ|Ύ])(?![α|ά|β|γ|δ|ε|έ|ζ|η|ή|λ|ι|ί|ϊ|ΐ|μ|ν|ο|ό|ρ|ω|ώ|Α|Ά|Β|Γ|Δ|Ε|Έ|Ζ|Η|Ή|Λ|Ι|Ί|Ϊ|Μ|Ν|Ο|Ό|Ρ|Ω|Ώ|])',
        '(Α[Υ|Ύ])',
        '(Ε[Υ|Ύ])',
        '(Η[Υ|Ύ])',
        '(Α[υ|ύ])(?![α|ά|β|γ|δ|ε|έ|ζ|η|ή|λ|ι|ί|ϊ|ΐ|μ|ν|ο|ό|ρ|ω|ώ|Α|Ά|Β|Γ|Δ|Ε|Έ|Ζ|Η|Ή|Λ|Ι|Ί|Ϊ|Μ|Ν|Ο|Ό|Ρ|Ω|Ώ|])',
        '(Ε[υ|ύ])(?![α|ά|β|γ|δ|ε|έ|ζ|η|ή|λ|ι|ί|ϊ|ΐ|μ|ν|ο|ό|ρ|ω|ώ|Α|Ά|Β|Γ|Δ|Ε|Έ|Ζ|Η|Ή|Λ|Ι|Ί|Ϊ|Μ|Ν|Ο|Ό|Ρ|Ω|Ώ|])',
        '(Η[υ|ύ])(?![α|ά|β|γ|δ|ε|έ|ζ|η|ή|λ|ι|ί|ϊ|ΐ|μ|ν|ο|ό|ρ|ω|ώ|Α|Ά|Β|Γ|Δ|Ε|Έ|Ζ|Η|Ή|Λ|Ι|Ί|Ϊ|Μ|Ν|Ο|Ό|Ρ|Ω|Ώ|])',
        '(Α[υ|ύ])',
        '(Ε[υ|ύ])',
        '(Η[υ|ύ])',
        '(α[Υ|Ύ])(?![α|ά|β|γ|δ|ε|έ|ζ|η|ή|λ|ι|ί|ϊ|ΐ|μ|ν|ο|ό|ρ|ω|ώ|Α|Ά|Β|Γ|Δ|Ε|Έ|Ζ|Η|Ή|Λ|Ι|Ί|Ϊ|Μ|Ν|Ο|Ό|Ρ|Ω|Ώ|])',
        '(ε[Υ|Ύ])(?![α|ά|β|γ|δ|ε|έ|ζ|η|ή|λ|ι|ί|ϊ|ΐ|μ|ν|ο|ό|ρ|ω|ώ|Α|Ά|Β|Γ|Δ|Ε|Έ|Ζ|Η|Ή|Λ|Ι|Ί|Ϊ|Μ|Ν|Ο|Ό|Ρ|Ω|Ώ|])',
        '(η[Υ|Ύ])(?![α|ά|β|γ|δ|ε|έ|ζ|η|ή|λ|ι|ί|ϊ|ΐ|μ|ν|ο|ό|ρ|ω|ώ|Α|Ά|Β|Γ|Δ|Ε|Έ|Ζ|Η|Ή|Λ|Ι|Ί|Ϊ|Μ|Ν|Ο|Ό|Ρ|Ω|Ώ|])',
        '(α[Υ|Ύ])',
        '(ε[Υ|Ύ])',
        '(η[Υ|Ύ])',
    ];
    protected $lat_spec_difthongs = [
        'af', 'ef', 'if', 'av', 'ev', 'iv',
        'AF', 'EF', 'IF', 'AV', 'EV', 'IV',
        'Af', 'Ef', 'If', 'Av', 'Ev', 'Iv',
        'aF', 'eF', 'iF', 'aV', 'eV', 'iV',
    ];

    //μπ difthong case, inner word 'μπ' converted to 'mp', 'μπ' at word boundaries with 'b'
    protected $el_mp_difthong = [
        '\\Bμπ\\B', '\\BΜΠ\\B', '\\BΜπ\\B', '\\BμΠ\\B',
        'μπ|μΠ', 'ΜΠ|Μπ',
    ];
    protected $lat_mp_difthong = [
        'mp', 'MP', 'Mp', 'mP',
        'b', 'B',
    ];

    //one fthong letters convertions
    protected $el_letters = [
        'α|ά', 'β', 'γ', 'δ', 'ε|έ', 'ζ', 'η|ή|ι|ί|ϊ|ΐ', 'κ', 'λ', 'μ', 'ν', 'ξ', 'ο|ό|ω|ώ', 'π', 'ρ', 'σ|ς', 'τ',
        'υ|ύ|ϋ|ΰ', 'φ',
        'Α|Ά', 'Β', 'Γ', 'Δ', 'Ε|Έ', 'Ζ', 'Η|Ή|Ι|Ί|Ϊ|ΐ', 'Κ', 'Λ', 'Μ', 'Ν', 'Ξ', 'Ο|Ό|Ω|Ώ', 'Π', 'Ρ', 'Σ|ς', 'Τ',
        'Υ|Ύ|Ϋ|ΰ', 'Φ',
    ];
    protected $lat_letters = [
        'a', 'v', 'g', 'd', 'e', 'z', 'i', 'k', 'l', 'm', 'n', 'x', 'o', 'p', 'r', 's', 't', 'y', 'f',
        'A', 'V', 'G', 'D', 'E', 'Z', 'I', 'K', 'L', 'M', 'N', 'X', 'O', 'P', 'R', 'S', 'T', 'Y', 'F',
    ];

    public function __construct(string $string = '')
    {
        $this->string = $string;
    }

    public function transliterate(): string
    {
        //do regex replacements, starting from difthongs, 1-fthong letters at the end
        $this->replace_letters($this->el_difthongs, $this->lat_difthongs)
             ->replace_letters($this->el_mp_difthong, $this->lat_mp_difthong)
             ->replace_letters($this->el_spec_difthongs, $this->lat_spec_difthongs)
             ->replace_letters($this->el_letters, $this->lat_letters);

        return $this->string;
    }

    private function replace_letters(array $current_letters_array, array $become_letters_array): self
    {
        mb_regex_encoding('UTF-8');

        for ($i = 0; $i < count($current_letters_array); $i++) {
            $this->string = mb_ereg_replace($current_letters_array[$i], $become_letters_array[$i], $this->string);
        }

        return $this;
    }
}
