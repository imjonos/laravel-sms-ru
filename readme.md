# Laravel sms.ru notifications 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codersstudio/sms-ru?style=flat-square)](https://packagist.org/packages/codersstudio/sms-ru)  [![Total Downloads](https://img.shields.io/packagist/dt/codersstudio/sms-ru.svg?style=flat-square)](https://packagist.org/packages/codersstudio/sms-ru)

## Install
`composer require codersstudio/sms-ru`

## Usage
Package for send sms via sms.ru. Based on official PHP class http://sms.ru/php.
This is package provide Channel and base Notification.

Create file `config/sms-ru.php` with content: (For details please read documentation http://sms.ru/php):

```
<?php

return [
    'api_key' => env('SMS_RU_API_KEY'),
    'from' => env('SMS_RU_FROM'),
    'translit' => env('SMS_RU_TRANSLIT', 1),
    'test' => env('SMS_RU_TEST', 1),
    'partner_id' => env('SMS_RU_PARTNER_ID', 0)
];
```

Examples:
    
notify method (notifiable should have phone property): 
   
    use CodersStudio\SmsRu\Notifications\SmsRu;
    ...
    $user->notify(new SmsRu('test'));

In Notification:

      public function via($notifiable)
      {
            return [SmsRuChannel::class];
      }   

      public function toSms($notifiable)
      {
            return [
                  'phone' => $this->phone,
                  'message' => $this->message
            ];
      }
      
Facade:

    SmsRu::send('89881234567', 'test'); // return bool



## Testing
Run the tests with:

``` bash
vendor/bin/phpunit
```

## Credits

- [Eugeny Nosenko](https://github.com/imjonos)

## Security
If you discover any security-related issues, please email info@coders.studio instead of using the issue tracker.

## License
The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.
