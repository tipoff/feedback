# Feedback

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tipoff/feedback.svg?style=flat-square)](https://packagist.org/packages/tipoff/feedback)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/tipoff/feedback/run-tests?label=tests)](https://github.com/tipoff/feedback/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/tipoff/feedback.svg?style=flat-square)](https://packagist.org/packages/tipoff/feedback)

This is where your description should go.

## Installation

You can install the package via composer:

```bash
composer require tipoff/feedback
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Tipoff\Feedback\FeedbackServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Tipoff\Feedback\FeedbackServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$skeleton = new Tipoff\Feedback();
echo $skeleton->echoPhrase('Hello, Tipoff!');
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

- [Tipoff](https://github.com/tipoff)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.