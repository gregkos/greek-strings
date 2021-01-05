# A manipulation library for Greek strings

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gregkos/greek-strings.svg?style=flat-square)](https://packagist.org/packages/gregkos/greek-strings)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/gregkos/greek-strings/Tests?label=tests)](https://github.com/gregkos/greek-strings/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/gregkos/greek-strings.svg?style=flat-square)](https://packagist.org/packages/gregkos/greek-strings)


A library to cover all your Greek string conversion needs.

Currently:
* Transliteration of Greek strings

Planned:
* Uppercase / lowercase conversions

Wishlist:
* Reverse transliteration

## Installation

You can install the package via composer:

```bash
composer require gregkos/greek-strings
```

## Usage

```php
$greek_string = new GregKos\GreekString('Καλημέρα!');

echo $greek_string->transliterate();

// Kalimera!
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
