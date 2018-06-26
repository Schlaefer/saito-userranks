# Userranks Plugin #

## What ##

Plugin for [Saito-Forum][saito]. Shows user rank based on number of postings in user-profile.

[saito]: https://github.com/Schlaefer/Saito

## Install ##

```bash
composer require schlaefer/saito-userranks
```

Activate plugin:

```php
bin/cake plugin load Siezi/SaitoUserranks
```

[See CakePHP plugin documentation for alternative methods](https://book.cakephp.org/3.0/en/plugins.html#loading-a-plugin).

Set the ranks in your `config/saito_config.php`. See the plugins `config/config.php` for an example configuration.

## Test ##

When installed as plugin:

```php
vendor/bin/phpunit vendor/schlaefer/saito-userranks/tests/
```
