# Mail

[![PHP from Packagist](https://img.shields.io/packagist/php-v/coffeebreaks/mail.svg?style=flat-square)](https://packagist.org/packages/coffeebreaks/mail)
[![Latest Stable Version](https://poser.pugx.org/coffeebreaks/mail/v/stable)](https://packagist.org/packages/coffeebreaks/mail)
[![Total Downloads](https://poser.pugx.org/coffeebreaks/mail/downloads)](//packagist.org/packages/coffeebreaks/mail)
[![License](https://poser.pugx.org/coffeebreaks/mail/license)](https://packagist.org/packages/coffeebreaks/mail)
[![Build](https://img.shields.io/scrutinizer/build/g/Guilherme-fagundes/mail.svg?style=flat-square)](https://scrutinizer-ci.com/g/Guilherme-fagundes/mail)
[![Quality Score](https://img.shields.io/scrutinizer/g/Guilherme-fagundes/mail.svg?style=flat-square)](https://scrutinizer-ci.com/g/Guilherme-fagundes/mail)

<p>A simple class email send</p>


#### Instalation

```bash
composer require coffeebreaks/mail
```


##### Example

```php

$mail = new \coffeebreaks\Mail();
$mail->config('smtp.your-host.com', 'your-user',
    'you-pass', port);
$mail->add('suport@example.com', 'Suport',
    'your-mail@domain.com', 'Test classe Mail',
    "This is a email with <b>PhpMailer</b> and generic class <i>Mail</i>");

if ($mail->getResult()){
    echo "Success :)";
}

```