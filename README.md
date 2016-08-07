# Flash

Store alert messages in the session.

[![Build Status](https://travis-ci.org/SidRoberts/flash.svg?branch=master)](https://travis-ci.org/SidRoberts/flash)



## Installation

```bash
composer require sidroberts/flash
```



## Usage

```php
$session   = new \Symfony\Component\HttpFoundation\Session\Session();
$formatter = new \Sid\Flash\Formatter\Text();

$flash = new \Sid\Flash\Flash($session, $formatter);
```

To add a message to the Flash, use any of the following methods: `danger()`,
`success()`, `info()` or `warning()`:

```php
$flash->danger(
    "This is an example message."
);
```

And now you can output the messages in your view:

```php
echo $flash->output();
```



### Formatters

Formatters determine how messages are outputted. To create your own you must
implement the `\Sid\Flash\FormatterInterface` interface. Currently, there are
two formatters:

#### `\Sid\Flash\Formatter\Html`

```html
<div class="alert alert-danger">This is an example message.</div>
```

#### `\Sid\Flash\Formatter\Text`

```
[DANGER] This is an example message.
```
