Yii SINOPTIK JUNIOR
============================

INSTALLATION
------------

- ```import yii_sinoptik_junior.sql```
- ```composer install```
- ```php -S localhost:8000 -t web```

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```
