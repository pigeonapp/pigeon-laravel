<h1 align="center">Pigeon</h1>

<p align="center">Pigeon lets you easily manage your outbound email, push notifications and SMS. Visit https://pigeonapp.io for more details.</p>


## Installation

Require via composer.

```shell
$ composer require pigeon/pigeon-laravel
```

### Laravel
The package will be discovered for Laravel >=5.5. For Laravel <=5.4, add package to the list of service providers in `config/app.php`
```
'providers' => [
    // ...
    Pigeon\Laravel\PigeonServiceProvider::class,
];
```

Add the Pigeon facade alias in your `config/app.php`.
```
'aliases' => [
    // ...
    'Pigeon' => Pigeon\Laravel\PigeonFacade::class,
];
```

### Lumen
In Lumen, find the `Register Service Providers` in your `bootstrap/app.php` and register the Pigeon Service Provider.
```
$app->register(Pigeon\Laravel\PigeonServiceProvider::class);
```

## Configuration
By default, the package uses `PIGEON_PUBLIC_KEY` and `PIGEON_PRIVATE_KEY` environment variables. To customize the configuration file, publish the package configuration using Artisan.
```
php artisan vendor:publish  --provider="Pigeon\Laravel\PigeonServiceProvider" --tag="config"
```
or if using Laravel 5.5:

```
php artisan vendor:publish
```

The settings can be found in the generated `config/pigeon.php` configuration file. By default, the keys would be retrieved from your .env file.

## Usage

### Prepare for the delivery

```php
$message_identifier = 'message-identifier';
$parcels = ['to' => 'john@example.com'];
```

- Message identifier is used to identify the message. Grab this from your Pigeon dashboard.
- Parcels array accepts `to`, `cc`, `bcc` and `data`.

### Deliver

```php
Pigeon::deliver($message_identifier, $parcels);
```

### Parcel sample (Single recipient)

```php
$parcels = [
  'to' => 'John Doe <john@example.com>',
  'cc' => [
    'admin@example.com',
    'Sales Team <sales@example.com>'
  ],
  'data' => [
    // template variables are added here
    'name' => 'John'
  ],
  'attachments' => [
    // `file` can be either local file path or remote URL
    [
      'file' => '/path/to/image.png',
      'name' => 'Logo'
    ],
    [
      'file' => 'https://example.com/guide.pdf',
      'name' => 'Guide'
    ]
  ]
];
```

### Parcel sample (Multiple recipients)

```php
$parcels = [
  [
    'to' => 'John Doe <john@example.com>',
    'data' => [
      // template variables are added here
      'name' => 'John'
    ]
  ],
  [
    'to' => 'Jane Doe <jane@example.com>',
    'data' => [
      // template variables are added here
      'name' => 'Jane'
    ]
  ],
];
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/pigeonapp/pigeon-laravel/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/pigeonapp/pigeon-laravel/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

The composer package is available as open source under the terms of the [MIT License](https://opensource.org/licenses/MIT).

## Code of Conduct

Everyone interacting in the Pigeon project’s codebases, issue trackers, chat rooms and mailing lists is expected to follow the [code of conduct](https://github.com/pigeonapp/pigeon-laravel/blob/master/CODE_OF_CONDUCT.md).
