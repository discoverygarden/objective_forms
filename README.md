# Objective Forms

## Introduction

The Objective Forms module contains a series of functions and classes that allow
Drupal forms to be treated as Fedora objects. It provides back-end support to
XML Forms so that Drupal's built-in form functions and classes can be used when
filling out metadata.

Some important notes:

* Each form element is assigned a unique #hash Form Property to identify it.
* Each form element is stored in a registry, and will persist through out the
  lifetime of the form even if it's removed from the form. Ancestry of Form
  Elements is stored, so if a Form Element is cloned we will be able to
  determine the Form Element that is was cloned from.
* Form Properties can be objects. To define new Form Properties, implement the
  hook `objectify_properties`.
* Forms will be auto-populated from `$form_states['values']`.
* There is a FormStorage class that can be used to store any persistent data.

## Requirements

This module requires the following modules/libraries:

* [PHP Lib](https://github.com/islandora/php_lib)
* [Encryption](https://www.drupal.org/project/encryption)

## Installation

Install as
[usual](https://www.drupal.org/docs/8/extending-drupal-8/installing-drupal-8-modules).

## Documentation

Further documentation for this module is available at the
[wiki](https://wiki.duraspace.org/display/ISLANDORA/Objective+Forms).

### AJAX Issues

If the messages:
* `AJAX form elements may not work as intended; notify an administrator.` or
* `Producing tamper-resistant serialization failed: AJAX form elements may be
  broken. Has the "encryption" module been configured?`

are reported, the `encryption` module has probably not been configured
correctly. See its documentation regarding an "encryption key" in your
`settings.php`.

## Troubleshooting/Issues

Having problems or solved one? Create an issue, check out the Islandora Google
groups.

* [Users](https://groups.google.com/forum/?hl=en&fromgroups#!forum/islandora)
* [Devs](https://groups.google.com/forum/?hl=en&fromgroups#!forum/islandora-dev)

or contact [discoverygarden](http://support.discoverygarden.ca).

## Maintainers/Sponsors

Current maintainers:

* [discoverygarden](http://www.discoverygarden.ca)

## Development

If you would like to contribute to this module, please check out the helpful
[Documentation](https://github.com/Islandora/islandora/wiki#wiki-documentation-for-developers),
[Developers](http://islandora.ca/developers) section on Islandora.ca and create
an issue, pull request and or contact
[discoverygarden](http://support.discoverygarden.ca).

## License

[GPLv3](http://www.gnu.org/licenses/gpl-3.0.txt)
