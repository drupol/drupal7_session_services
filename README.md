[![Build Status](https://www.travis-ci.org/drupol/drupal7_session_services.svg?branch=master)](https://www.travis-ci.org/drupol/drupal7_session_services)

# Drupal 7 Session Services

This library provides a session storage handler for using the Drupal 7 session mechanism with HTTPFoundation Symfony's session component.

If you need to use Drupal 7 and a library that rely on Symfony's HTTPFoundation component for handling sessions, you will need this to share session information between the library and Drupal.

## Installation

```bash
composer require drupol/drupal7_session_services
```

## Usage

```yaml
  session:
    class: Symfony\Component\HttpFoundation\Session\Session
    arguments: ['@session_storage', '@attribute_bags', '@flash_bag']

  session_storage:
    class: Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage
    arguments: [[], '@session_handler', null]

  session_handler:
    class: drupol\drupal7_session_services\Session\Storage\Handler\Drupal7SessionHandler

  attribute_bags:
    class: Symfony\Component\HttpFoundation\Session\Attribute\NamespacedAttributeBag

  flash_bag:
    class: Symfony\Component\HttpFoundation\Session\Flash\FlashBag
```

or with PHP:

```php
  $drupal7SessionHandler = new \drupol\drupal7_session_services\Session\Storage\Handler\Drupal7SessionHandler();
  $sessionstorage = new \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage([], $drupal7SessionHandler, null);
  $attributeBag = new \Symfony\Component\HttpFoundation\Session\Attribute\NamespacedAttributeBag();
  $flashBag = new \Symfony\Component\HttpFoundation\Session\Flash\FlashBag();

  $session = new \Symfony\Component\HttpFoundation\Session\Session($sessionstorage, $attributeBag, $flashBag);
```

## Run the tests

```bash
composer install
./vendor/bin/grumphp run
```
