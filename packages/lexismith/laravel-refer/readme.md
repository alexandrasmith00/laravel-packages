# Referral Waitlist for Laravel 5

This is a [Laravel](http://laravel.com/) service provider to easily create a referral waitlist system.


## Installation

The Laravel Referral can be installed via [Composer](http://getcomposer.org) by requiring the
`lexismith/laravel-refer` package in your project's `composer.json`.

```json
	{
		"require": {
			"lexismith/laravel-refer": "dev-master"
		}
	}
```

Then run a composer update
```sh
php composer.phar update
```

To use the Laravel Referral service provider, you must register the provider when bootstrapping your Laravel application, as well as the HTML collectives (used in the views). 

Find the `providers` key in your `config/app.php` and register the service provider.

```php
    'providers' => array(
        // ...
    		'LexiSmith\LaravelRefer\ReferralServiceProvider',
				Collective\Html\HtmlServiceProvider::class,

    )
```

    	

Find the `aliases` key in your `config/app.php` and add the Alchemy facade alias.

```php
    'aliases' => array(
        // ...
        'Referral' 	=> 'LexiSmith\LaravelRefer\ReferralFacade',
				'Form' 			=> Collective\Html\FormFacade::class,

    )
```

## Configuration

By default, the package uses the following environment variables to auto-configure the plugin without modification:
```
API_KEY
BASE_URL
```

To customize the configuration file, publish the package configuration using Artisan.

```sh
php artisan vendor:publish
```

Update your settings in the generated `app/config/alchemy.php` configuration file or by editing your environment variables accordingly in  `.env`

```php
return [
		'url' => env('ALCHEMY_URL', 'http://access.alchemyapi.com/calls'),
		'key' => env('ALCHEMY_API_KEY')
];
```

## Usage

I'll be getting to this!



## Links
<!--

* [AWS SDK for PHP on Github](http://github.com/aws/aws-sdk-php/)
* [AWS SDK for PHP website](http://aws.amazon.com/sdkforphp/)
* [AWS on Packagist](https://packagist.org/packages/aws/)
* [License](http://aws.amazon.com/apache2.0/)
-->
* [Laravel website](http://laravel.com/)