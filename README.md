# Integration of FirstData in Laravel

This package has tools to integrate firstdata payments in a laravel project.

## Installation

Require the package
``` 
composer require sargilla/firstdata
```


Publish config file
```
php artisan vendor:publish --tag=firstdata
```

Configurate the .env file with your store data
```
FIRSTDATA_FORM_URL=
FIRSTDATA_STORE_ID=
FIRSTDATA_SHARED_SECRET=
FIRSTDATA_RESPONSE_FAILURE=
FIRSTDATA_RESPONSE_SUCCESS=
FIRSTDATA_RESPONSE_NOTIFICATION=
FIRSTDATA_TIMEZONE=
```
## How to use
You can use the Firstdata facade to call two methods in your blade templates :

```php

Firstdata::getDateTime() // It returns formated datetime


Firstdata::createExtendedHash($totalcharge,$currency,$invoiceNumber) 

```

## Example form request

This is an example form to test the integration 

```html
<html>
<head>
    <title>IPG Connect Sample for PHP</title>
</head>
<body>
    <h1>Order Form</h1>
    <form method="post" action="{{config('firstdata.form_url')}}">
        <input type="hidden" name="txntype" value="sale">
        <input type="hidden" name="timezone" value="{{config('firstdata.timezone')}}" />
        <input type="hidden" name="txndatetime" value="{{ Firstdata::getDateTime() }}" />
        <input type="hidden" name="hash_algorithm"  value="HMACSHA256" />
        <input type="hidden" name="hashExtended" value="{{ Firstdata::createExtendedHash('13.00','032','50') }}" />
        <input type="hidden" name="storename" value="{{ config('firstdata.store_id') }}" />
        <input type="hidden" name="mode" value="payonly" />
        <input type="hidden" name="paymentMethod" value="M" />
        <input type="hidden" name="chargetotal" value="13.00" />
        <input type="hidden" name="currency" value="032" />
        <input type="hidden" name="invoicenumber" value="50" />
        <input type="hidden" name="responseFailURL" value="{{ config('firstdata.response_failure') }}" />
        <input type="hidden" name="responseSuccessURL" value="{{ config('firstdata.response_success') }}" />
        <input type="hidden" name="transactionNotificationURL" value="{{ config('firstdata.response_notification') }}" />
        <input type="submit" value="Submit">
    </form>
</body>
</html>
```
