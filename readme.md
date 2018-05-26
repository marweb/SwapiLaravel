## Laravel Pesonajes de Star Wars


## Requisitos

- [Composer](https://getcomposer.org/)
- [PHP 5.6.4ˆ](https://secure.php.net/)
- [Node](https://nodejs.org)
- [Bower](https://bower.io/)

## Correr el Proyecto Localmente


- 1 - Instalar Dependencias de Composer PHP

```sh
$ composer install
```

- 2 - Instalar Dependencias de Bower

```sh
$ cd public/assets
$ bower install
$ cd ../..
```

- 3 - Hacer una copia de .env.example y renombrar como .env:

```sh
$ cp .env.example .env
```

- 4 - Generar Llave de Laravel:

```sh
$ php artisan key:generate
```

- 5 - Correr Servidor PHP de Laravel:

```sh
$ php artisan serve
```

- 6 - Abrir en el navegador[http://127.0.0.1:8000](http://127.0.0.1:8000)