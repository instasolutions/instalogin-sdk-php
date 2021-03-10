# Instalogin PHP SDK

A simple PHP wrapper for the Instalogin API. 

## Prerequisites

To successfully initialize the PHP client, you'll need an API key and API secret from Instalogin.

```ini
# Example .env Data

INSTALOGIN_KEY=...
INSTALOGIN_SECRET=...
```

## Installation

**Instalogin PHP SDK** is available on Packagist as the [instalogin/sdk](http://packagist.org/packages/instalogin/sdk) package.
Run `composer require instalogin/sdk` from the root of your project in terminal, and you are done. The minimum PHP version currently supported is 5.6.

## Client Initialization

Once you have the SDK installed in your project, you will need to instantiate a Client object.

```php
$client = new \Instalogin\Client($_ENV['INSTALOGIN_KEY'], $_ENV['INSTALOGIN_SECRET']);
```


### License
The Instalogin PHP SDK is licensed under the Apache License, version 2.0.