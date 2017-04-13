# Sylius Location Bundle

This bundle adds location (shops, offices, ...) functionality to Sylius e-commerce platform. Locations are translatable,
and can have their own images. Frontend has a listing of all locations, a simple search, detailed location view with
images and Google Maps support on both pages.

---

## Installation

  1. require the bundle with Composer:

  ```bash
  $ composer require webburza/sylius-location-bundle
  ```

  2. enable the bundle in `app/AppKernel.php`:

  ```php
  public function registerBundles()
  {
    $bundles = [
      // ...
      new \Webburza\Sylius\LocationBundle\WebburzaSyliusLocationBundle(),
      // ...
    ];
  }
  ```

  3. add configuration to the top of `app/config/config.yml`:

  ```yaml
  imports:
      - { resource: "@WebburzaSyliusLocationBundle/Resources/config/config.yml" }
  ```

  Among other things, this provides configuration entries which can then be overriden
  in your app's config.yml.

  ```
  webburza_sylius_location:
      google_maps_enabled: false
      google_maps_key: 1234567890
  ```

  4. register routes in `app/config/routing.yml`

  ```yaml
  webburza_sylius_location_bundle:
      resource: "@WebburzaSyliusLocationBundle/Resources/config/routing.yml"
  
  webburza_sylius_location_bundle_front:
      resource: "@WebburzaSyliusLocationBundle/Resources/config/routingFront.yml"
      prefix: /location
  ```

  As you can see, there are two groups of routes, the main resource (administration)
  routes and frontend routes.

  5. The bundle should now be fully integrated, but it still requires
database tables to be created. For this, we recommend using migrations.

  ```bash
  $ bin/console doctrine:migrations:diff
  $ bin/console doctrine:migrations:migrate
  ```
  
  Or if you don't use migrations, you can update the database schema directly.
  
  ```bash
    $ bin/console doctrine:schema:update
  ```

  6. By default, there will be no location types defined. You should create and translate
the location types that you need and create locations that use those types.

## Translations and naming

The bundle has multilingual support, and language files can be
overridden as with any other bundle, by creating translation files in the
`app/Resources/WebburzaSyliusLocationBundle/translations` directory.

To get started, check the bundle's main language file in:
[Resources/translations/messages.en.yml](Resources/translations/messages.en.yml)

## License

This bundle is available under the [MIT license](LICENSE).

## To-do

- automated tests
