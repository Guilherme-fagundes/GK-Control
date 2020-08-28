
[![Source Code](http://img.shields.io/badge/source-coffeebreaks/friendly-url-blue.svg?style=flat-square)](https://github.com/Guilherme-fagundes/friendly-url)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/coffeebreaks/friendly-url.svg?style=flat-square)](https://packagist.org/packages/coffeebreaks/friendly-url)
[![Latest Stable Version](https://poser.pugx.org/coffeebreaks/friendly-url/v)](//packagist.org/packages/coffeebreaks/friendly-url)
[![License](https://poser.pugx.org/coffeebreaks/friendly-url/license)](//packagist.org/packages/coffeebreaks/friendly-url)
[![Total Downloads](https://poser.pugx.org/coffeebreaks/friendly-url/downloads)](//packagist.org/packages/coffeebreaks/friendly-url)
[![Build](https://img.shields.io/scrutinizer/build/g/Guilherme-fagundes/friendly-url.svg?style=flat-square)](https://scrutinizer-ci.com/g/Guilherme-fagundes/friendly-url)
[![Quality Score](https://img.shields.io/scrutinizer/g/Guilherme-fagundes/friendly-url.svg?style=flat-square)](https://scrutinizer-ci.com/g/Guilherme-fagundes/friendly-url)

### Friendly Url
<p>This class performs the route function</p>

#### Instalation
```bash
composer require coffeebreaks/route
```

#### Config.php

```php
define('HOME', ""); // Base URI
define('THEME', ''); // Your theme
define('INCLUDE_PATH', 'themes'.DIRECTORY_SEPARATOR.THEME);
```


### .htaccess

```.htaccess
RewriteEngine On

Options All -indexes

RewriteCond %{SCRIPT_FILENAME} !-d
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteRule ^(.*)$ index.php?url=$1 [L,QSA]
```