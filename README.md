# This is my package IssProduto

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bildvitta/iss-produto.svg?style=flat-square)](https://packagist.org/packages/bildvitta/iss-produto)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/bildvitta/iss-produto/run-tests?label=tests)](https://github.com/bildvitta/iss-produto/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/bildvitta/iss-produto/Check%20&%20fix%20styling?label=code%20style)](https://github.com/bildvitta/iss-produto/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/bildvitta/iss-produto.svg?style=flat-square)](https://packagist.org/packages/bildvitta/iss-produto)

This package is the `Product of Product` module sdk.

## Support us

- Real Estate Development (paginate, find).

## Installation

You can install the package via composer:

```bash
composer require bildvitta/iss-produto
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Bildvitta\IssProduto\IssProdutoServiceProvider" --tag="iss-produto-config"
```

This is the contents of the published config file:

```php
return [

    'base_uri' => env('MS_PRODUTO_BASE_URI'),

    'prefix' => env('MS_PRODUTO_API_PREFIX')
];
```

## Config

In your .env file, associate the following variables.

````dotenv
# API base URL.
MS_PRODUTO_BASE_URI="http://127.0.0.1:8001"

# API prefix if it exists.
MS_PRODUTO_API_PREFIX="/api"
````

## Usage

```php
$issProduto = new \Bildvitta\IssProduto\IssProduto('jwt-hub');

$issProduto->realStateDevelopment()->search(['name' => 'Example']);
print_r($issProduto->realStateDevelopment()->find('uuid'));
```

This is result:

`````json
{
    "result": {
        "uuid": "77b83e9e-5e20-4dbc-8d27-5bf3ea960888",
        "status": "ready_for_commercialization",
        "address": "R. Ohana Verdugo",
        "city": "Théo do Leste",
        "name": "Example",
        "...": "..."
    }
}
`````

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

- [BILD\jean.garcia](https://github.com/SOSTheBlack)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
