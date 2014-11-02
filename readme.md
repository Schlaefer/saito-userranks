# Userranks Plugin #

## What ##

Plugin for [Saito-Forum][saito]. Shows user rank based on number of postings in user-profile.

[saito]: https://github.com/Schlaefer/Saito

## Install ##

Either clone/copy the files in this directory into `app/Plugin/Flattr` or using composer:

```json
{
    "require": {
        "schlaefer/saito-userranks": "*"
    }
}
```

Activate plugin by including it in your `app/Config/saito_config.php`:

```php
CakePlugin::load('Userranks', ['bootstrap' => true]);
```

Set your ranks in the plugin's `Config/config.php` or the global `app/Config/saito_config.php`.

## Test ##

```php
app/Console/cake test Userranks Lib/Userranks
```
