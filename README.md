# laravel-admin-panel
Admin Panel - Laravel - MultiFunction



## Install


```sh
git clone https://github.com/DiruzCode/laravel-admin-panel.git

cd laravel-admin-panel/
composer install
npm install
cp .env.example .env

```

## Config

* Edit you database config

```php

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

```


```sh
php artisan migrate
php artisan db:seed
php artisan key:generate
npm run dev
```

> **Note:** this admin panel has the following Packages.


Jwt

[tymondesigns/jwt-auth](https://github.com/tymondesigns/jwt-auth)

you need use this command: 

```sh
php artisan jwt:secret
```

Cors

[barryvdh/laravel-cors](https://github.com/barryvdh/laravel-cors)

PDF 

[barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf)


permission

[spatie/laravel-permission](https://github.com/spatie/laravel-permission)


excel

[Maatwebsite/Laravel-Excel](https://github.com/Maatwebsite/Laravel-Excel)


in your routes, you have the api and web file enabled


