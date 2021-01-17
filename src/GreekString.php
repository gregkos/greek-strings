<?php

namespace GregKos\GreekStrings;

class GreekString
{
    private string $string;

    public function __construct(string $str = '')
    {
        $this->string = $str;
    }

    public function getString(): string
    {
        return $this->string;
    }

    public function setString(string $str): self
    {
        $this->string = $str;

        return $this;
    }

    public function transliterate(): string
    {
        return Transliterator::convert($this->string);
    }

    public function toUpper($removeAccent = true): string
    {
        return CaseConverter::convert($this->string, 'upper', $removeAccent);
    }

    public function toLower($removeAccent = true): string
    {
        return CaseConverter::convert($this->string, 'lower', $removeAccent);
    }
}
