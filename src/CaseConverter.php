<?php

namespace GregKos\GreekStrings;

class CaseConverter
{
    public static function convert(string $str, string $target = null, bool $removeAccent = true): string
    {
        if ($target === 'upper') {
            $str = mb_strtoupper($str, 'UTF-8');
        }

        if ($target === 'lower') {
            $str = mb_strtolower($str, 'UTF-8');
        }

        if ($removeAccent) {
            $str = self::removeAccent($str);
        }

        return $str;
    }

    private static function removeAccent(string $str): string
    {
        $upper_accent_letters = ['Ά', 'Έ', 'Ή', 'Ί|Ϊ|Ϊ́', 'Ό', 'Ύ|Ϋ|Ϋ́', 'Ώ'];
        $upper_no_accent_letters = ['Α', 'Ε', 'Η', 'Ι', 'Ο', 'Υ', 'Ω'];
        $lower_accent_letters = ['ά', 'έ', 'ή', 'ί|ϊ|ΐ', 'ό', 'ύ|ϋ|ΰ', 'ώ'];
        $lower_no_accent_letters = ['α', 'ε', 'η', 'ι', 'ο', 'υ', 'ω'];

        // mb_regex_encoding('UTF-8');

        for ($i = 0; $i < count($upper_accent_letters); $i++) {
            $str = mb_ereg_replace($upper_accent_letters[$i], $upper_no_accent_letters[$i], $str);
        }

        for ($i = 0; $i < count($lower_accent_letters); $i++) {
            $str = mb_ereg_replace($lower_accent_letters[$i], $lower_no_accent_letters[$i], $str);
        }

        return $str;
    }
}
