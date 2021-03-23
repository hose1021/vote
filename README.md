# vote

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hose1021/vote.svg?style=flat-square)](https://packagist.org/packages/hose1021/vote)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/hose1021/vote/run-tests?label=tests)](https://github.com/hose1021/vote/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/hose1021/vote/Check%20&%20fix%20styling?label=code%20style)](https://github.com/hose1021/vote/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/hose1021/vote.svg?style=flat-square)](https://packagist.org/packages/hose1021/vote)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require hose1021/vote
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Hose1021\Vote\VoteServiceProvider" --tag="vote-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Hose1021\Vote\VoteServiceProvider" --tag="vote-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$vote = new Hose1021\Vote();
echo $vote->echoPhrase('Hello, Hose1021!');
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

- [Hose1021](https://github.com/hose1021)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
