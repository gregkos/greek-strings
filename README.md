# A manipulation library for Greek strings

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gregkos/greek-strings.svg?style=flat-square)](https://packagist.org/packages/gregkos/greek-strings)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/gregkos/greek-strings/run-tests.yml?branch=master&label=tests)](https://github.com/gregkos/greek-strings/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/gregkos/greek-strings.svg?style=flat-square)](https://packagist.org/packages/gregkos/greek-strings)


A library to cover all your Greek string conversion needs.

Currently:
* Transliteration of Greek strings
* Uppercase / lowercase conversions

Planned:
* Open to feature requests! :)

Wishlist:
* Reverse transliteration
* Accent guesstimates

## Installation

You can install the package via composer:

```bash
composer require gregkos/greek-strings
```

## Usage

You can create a new string by calling the constructor:

```php
$greek_string = new GregKos\GreekString('Καλημέρα!');
```

You can transliterate any greek letters in the string like so:

```php
echo $greek_string->transliterate();

// Kalimera!
```

You can convert the string to `UPPERCASE`...

```php
echo $greek_string->toUpper();

// ΚΑΛΗΜΕΡΑ!
```

...or convert it to `lowercase`

```php
echo $greek_string->toLower();

// καλημερα!
```

Keep in mind that conversions remove the accent unless you explicitly pass a parameter:

```php
echo $greek_string->toUpper(false);

// ΚΑΛΗΜΈΡΑ!
```

However, there is no efficient way to add an accent that was not there before:

```php
$greek_string = new GregKos\GreekString('ΚΑΛΗΜΕΡΑ!');

echo $greek_string->toLower();

// καλημερα!
```

## Method Reference

The following methods are available on any GreekString instance:

```php
// Returns the string as is
getString(): string

// Set a new string for the instance
// $str = a valid string
setString(string $str): self

// Return a transliterated version of the string
transliterate(): string

// Return an uppercase version of the string
// $removeAccent = a bool to determine whether or not
// to remove accent from the string (default: true)
toUpper($removeAccent = true): string

// Return an lowercase version of the string
// $removeAccent = a bool to determine whether or not
// to remove accent from the string (default: true)
toLower($removeAccent = true): string
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Spatie](https://spatie.be) for the [package skeleton](https://github.com/spatie/package-skeleton-php)
- [multipetros](https://github.com/multipetros) for the [inspiration and parts of the code](https://github.com/multipetros/ElStr.class.php)
- [GregKos](https://github.com/gregkos)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
