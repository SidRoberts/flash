# Flash

Store alert messages in the session.

[![Build Status](https://travis-ci.org/SidRoberts/flash.svg?branch=master)](https://travis-ci.org/SidRoberts/flash)
[![GitHub tag](https://img.shields.io/github/tag/sidroberts/flash.svg?maxAge=2592000)]()



## Installation

```bash
composer require sidroberts/flash
```



## Usage

```php
$session   = new \Symfony\Component\HttpFoundation\Session\Session();
$formatter = new \Sid\Flash\Formatter\TextFormatter();

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
implement [`\Sid\Flash\FormatterInterface`](https://github.com/SidRoberts/flash/blob/master/src/FormatterInterface.php).
Currently, there are two formatters:

#### [`\Sid\Flash\Formatter\HtmlFormatter`](https://github.com/SidRoberts/flash/blob/master/src/Formatter/HtmlFormatter.php)

```html
<div class="alert alert-danger">This is an example message.</div>
```

#### [`\Sid\Flash\Formatter\TextFormatter`](https://github.com/SidRoberts/flash/blob/master/src/Formatter/TextFormatter.php)

```
[DANGER] This is an example message.
```
