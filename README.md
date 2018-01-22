# Run Dusk tests in Opera

[![Latest Version on Packagist](https://img.shields.io/packagist/v/appstract/laravel-dusk-opera.svg?style=flat-square)](https://packagist.org/packages/appstract/laravel-dusk-opera)
[![Total Downloads](https://img.shields.io/packagist/dt/appstract/laravel-dusk-opera.svg?style=flat-square)](https://packagist.org/packages/appstract/laravel-dusk-opera)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/appstract/laravel-dusk-opera/master.svg?style=flat-square)](https://travis-ci.org/appstract/laravel-dusk-opera)

This package allows you to use Opera Webdriver in Dusk, so you don't need Selenium to run Dusk tests in Opera.

This requires a recent version of Opera.

## Installation

You can install the package via composer:

``` bash
composer require appstract/laravel-dusk-opera
```

## Usage

Add the ``SupportsOpera`` trait to your DuskTestCase:
```php
use Appstract\DuskDrivers\Opera\SupportsOpera;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication, SupportsOpera;
}
```

Now you can start the server in the ```prepare``` method:
```php
public static function prepare()
{
    static::startOperaDriver();
}
```

Instruct Dusk to use Opera by changing ```DesiredCapabilities::chrome()```
to ```DesiredCapabilities::opera()``` in the Driver method:

```php
protected function driver()
{
    return RemoteWebDriver::create(
        'http://localhost:9515', DesiredCapabilities::opera()
    );
}
```

## Contributing

Contributions are welcome, [thanks to y'all](https://github.com/appstract/laravel-blade-directives/graphs/contributors) :)

## About Appstract

Appstract is a small team from The Netherlands. We create (open source) tools for webdevelopment and write about related subjects on [Medium](https://medium.com/appstract). You can [follow us on Twitter](https://twitter.com/teamappstract), [buy us a beer](https://www.paypal.me/teamappstract/10) or [support us on Patreon](https://www.patreon.com/appstract).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
