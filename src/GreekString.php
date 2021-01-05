<?php

namespace GregKos\GreekStrings;

class GreekString
{
    private string $string;

    public function __construct(string $string = '')
    {
        $this->string = $string;
    }

    public function transliterate(): string
    {
        return Transliterator::convert($this->string);
    }
}
