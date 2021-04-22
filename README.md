# Instalogin PHP SDK

A simple PHP wrapper for the Instalogin API.

## Quick Guide

Below is a striped down guide how to integrate Instalogin in your project to test it easily. We are already
preparing a comprehensive documentation covering all possible use cases and parameters. So stay tuned.

_Please notice: this document is a work in progress and currently addresses PHP 5.6 for backward compatibility._

### Prerequisites

To successfully initialize the PHP client, you'll need an API key and API secret from Instalogin.

```ini
# Example .env Data

INSTALOGIN_KEY=...
INSTALOGIN_SECRET=...
```

### Installation

**Instalogin PHP SDK** is available on Packagist as the [instalogin/sdk](http://packagist.org/packages/instalogin/sdk)
package. Run `composer require instalogin/sdk` from the root of your project in terminal, and you are done. If you
cannot use `composer` for any reasons you can download the [latest version](https://github.com/instalogin/instalogin-php/releases)
from GitHub. The minimum PHP version currently supported is 5.6.

### Client Initialization

Once you have the SDK installed in your project, you will need to instantiate a Client object. This example assumes
that you store the secrets in some environment variables: 

```php
$client = new \Instalogin\Client($_ENV['INSTALOGIN_KEY'], $_ENV['INSTALOGIN_SECRET']);
```

### Provisioning

Before a user account can be used with the Instalogin app, it needs to be provisioned. The easiest way to provision
an account with Instalogin is to send the user an email with a provisioning QR Code inside. A good starting point
could be a "Provision with Instalogin" button somewhere in the protected area, which triggers the following
process in the backend:

```php
try {
    $client->provisionIdentity('john.doe@example.com', array(
        'sendEmail' => true // Let Instalogin handle the mail sending
    ));
    
} catch (\Instalogin\Exception\TransportException $e) {
    echo 'Could not connect to Instalogin service: '.$e->getMessage();
}
```

If you do not want to use email addresses as identifiers, and still want to let Instalogin send the provision email,
just provide the recipients email as parameter. We do not store this data anywhere - it is just used to send the
provision email:

```php
try {
    $client->provisionIdentity('john.doe', array(
        'sendEmail' => 'john.doe@example.com'
    ));
    
} catch (\Instalogin\Exception\TransportException $e) {
    echo 'Could not connect to Instalogin service: '.$e->getMessage();
}
```

This code creates or uses an existing identity and sends out an email with a QR Code, that needs to be scanned with the
Instalogin app. Once done, the provisioning is completed, and the user is ready to authenticate using the Instalogin app. 

### Frontend

Add the following few lines to your HTML frontend to show the Instalogin image used for authentication.

```html
<!-- Place this HTML node wherever the Instalogin image should appear -->
<div id="instalogin"></div>

<!-- Load the JavaScript library asynchronously (non-blocking) and configure it -->
<script async id="instalogin-js" src="https://cdn.instalog.in/js/instalogin.js"></script>
<script>
    // Wait until the script has loaded
    document.getElementById("instalogin-js").addEventListener("load", function() {
        new Instalogin.Auth({
            key: "<?php echo $_ENV['INSTALOGIN_KEY'] ?>", // The Instalogin key
            authenticationUrl: "/path/to/login-controller"  // The authentication controller to process the authentication 
        }).start();
    });
</script>
```

### Authentication

The authentication controller configured in the JavaScript will receive a standard authorization header from the
Instalogin API. The first thing needs to be done inside the controller is extracting the token from the header and decode it.

```php
// Extract the JWT from header, ignoring the "Bearer" prefix
$jwt = mb_substr($request->headers->get('Authorization'), 7);

// decode it
$token = $client->decodeJwt($jwt);
```
_Notice: The JWT is submitted using the standard header `Authorization: Bearer ...`_

Next you should check if the user trying to authenticate is in your own system and allowed to login. This is your own
business logic, thus just as an example:

```php
// $userRepository is any PHP class used for database queries 
$user = $userRepository->retrieveByUsername($token->getIdentifier());

// Check any internal business logic
if (!$user->isEnabled() || !$user->isSubscriptionActive()) {
    return false;
}
```

The final and important thing you need to do is to check, if the authentication attempt was actually performed on
the Instalogin system:

```php
if (!$client->verifyToken($token)) {
    // Authentication attempt could not be verified or is invalid
    return false;
}
```

_Notice: for security reasons any network or server error will always return false._

At this stage you can authenticate the user by setting up session variables etc. and redirect him to the protected area. 

### License
The Instalogin PHP SDK is licensed under the Apache License, version 2.0.