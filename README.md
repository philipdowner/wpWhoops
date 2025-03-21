# wps — WordPress plugin for whoops
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Rarst/wps/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Rarst/wps/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/rarst/wps/v/stable)](https://packagist.org/packages/rarst/wps)
[![Total Downloads](https://poser.pugx.org/rarst/wps/downloads)](https://packagist.org/packages/rarst/wps)
[![PHP version](https://img.shields.io/packagist/php-v/rarst/wps.svg)](https://packagist.org/packages/rarst/wps)
[![Download wps](https://img.shields.io/badge/download-wps.zip-blue)](https://github.com/Rarst/wps/releases/latest/download/wps.zip)

wps adds [whoops](http://filp.github.io/whoops/) error handler to a WordPress installation. 

It makes error messages from PHP, `admin-ajax.php`, and WP REST API a _great_ deal more clear and convenient to work with.

## Installation

| [Composer](https://getcomposer.org/) (recommended) | Release archive |  
| -------------------------------------------------- | -------- |  
| `composer require rarst/wps` | [![Download wps](https://img.shields.io/badge/download-wps.zip-blue?style=for-the-badge)](https://github.com/Rarst/wps/releases/latest/download/wps.zip) |

## Usage

The plugin is meant strictly for development and will only work with `WP_DEBUG` and `WP_DEBUG_DISPLAY` configuration constants enabled.

## Silence errors

whoops can definitely get noisy with a lot of low–grade errors.

Silence errors for irrelevant locations to keep it practical and productive.

### Silence for URL

Use `?wps_disable` query argument in the URL to temporarily disable whoops. 

### Silence for path

Use regular expressions to match source file paths and [error constants](https://www.php.net/manual/en/errorfunc.constants.php) to configure what should be silenced.

This can be called multiple times and/or array of paths can be provided.

Note that the direction of slashes needs to match operating system or write your regexes to match either.

```php
global $wps;

// Silence notices and warnings for any path. 
$wps['run']->silenceErrorsInPaths( '~.*~', E_NOTICE | E_WARNING );

// Silence for specific directory.
$wps['run']->silenceErrorsInPaths( '~/wp-admin/~', E_NOTICE | E_WARNING );

// Silence _except_ specific directory.
$wps['run']->silenceErrorsInPaths( '~^((?!/my-plugin/).)*$~', E_NOTICE | E_WARNING );

// Silence for plugins _except_ specific plugin.
$wps['run']->silenceErrorsInPaths( '~/wp-content/plugins/(?!my-plugin)~', E_NOTICE | E_WARNING );
```
### Testing a fatal error state

If you desire a method to test that the plugin is installed correctly, you can [create a simple mu-plugin](https://developer.wordpress.org/advanced-administration/plugins/mu-plugins/). At `/wp-content/mu-plugins` create the file `trigger-fatal-error.php`. Add the following code:

```php
/**
* Plugin Name: Trigger Fatal Error
*/
add_action('wp_loaded', function () {
	if(
		isset($_GET['triggerFatalError']) &&
		WP_DEBUG &&
		WP_DEBUG_DISPLAY
	) {
		noSuchFunction();
	}
}, 1);
```

On the frontend of your site, trigger an error by appending `?triggerFatalError=true` to your URL.

Like Whoops, this should only be used in a non-production environment.

## License

MIT
