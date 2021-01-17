<?php

namespace GregKos\GreekStrings;

class CaseConverter
{
    private static array $upper_accent_letters = ['Ά', 'Έ', 'Ή', 'Ί|Ϊ', 'Ό', 'Ύ|Ϋ', 'Ώ'];
    private static array $upper_no_accent_letters = ['Α', 'Ε', 'Η', 'Ι', 'Ο', 'Υ', 'Ω'];
    private static array $lower_accent_letters = ['ά', 'έ', 'ή', 'ί|ϊ', 'ό', 'ύ|ϋ', 'ώ'];
    private static array $lower_no_accent_letters = ['α', 'ε', 'η', 'ι', 'ο', 'υ', 'ω'];

    public static function convert(string $str, string $target = null): string
    {
        if ($target === 'upper') {
            $str = mb_strtoupper($str, 'UTF-8');
        }

        if ($target === 'lower') {
            $str = mb_strtolower($str, 'UTF-8');
        }

        $str = self::removeAccent($str);

        return $str;
    }

    private static function removeAccent(string $str): string
    {
        // mb_regex_encoding('UTF-8');

        for ($i = 0; $i < count(self::$upper_accent_letters); $i++) {
            $str = mb_ereg_replace(self::$upper_accent_letters[$i], self::$upper_no_accent_letters[$i], $str);
        }

        for ($i = 0; $i < count(self::$lower_accent_letters); $i++) {
            $str = mb_ereg_replace(self::$lower_accent_letters[$i], self::$lower_no_accent_letters[$i], $str);
        }

        return $str;
    }
}
