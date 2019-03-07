<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Cosas pendientes por seccion

Aqui vamos a ir apuntando por secciones las tareas que se van haciendo, las que estan hechas y las que estan por hacer, para tener un seguimiento del estado actual del proyecto.

### Registro

- API RESTful

### Alquiler

- Crear controlador:
    - Insert
    - Update -> Fecha Fin
    - Historial Alquiler
    - Vista Area Usuario
    - Vista ampliada pelicula

- API RESTful

### SCSS

  https://www.youtube.com/watch?v=tFmcOOdiLv0
  - Instalar node.js i npm -> https://www.npmjs.com/get-npm
  - Ejecutar npm run watch para que vaya compilando el css

### Enlaces interes

Login to guapo: https://www.youtube.com/watch?v=HV7DtH3J2PU

### Socialite
Bueno, bueno, bueno. Tela carinyu.
  - Github: de puta madre, a al primera sin problemas. UPDATE: ya no va

  - Twitter: no podemos poner localhost ni 127.0.0.1 como url de la app. Tenemos que canviar xampp i los hosts.
    - En el archivo de hosts añadimos la siguiente linia: 127.0.0.1   blockbuster.com
    - En httpd-vhosts.conf (C:\xampp\apache\conf\extra) añadir lo siguiente:
      ```shell
      <VirtualHost *:80>
        ServerName www.blockbuster.com
        ServerAlias blockbuster.com
        DocumentRoot "C:\xampp\htdocs\Videoclub\public"
      </VirtualHost>
      ```
    - Ademas, claro, la carpeta tiene que estar dentro de htdocs.

  - Google: algo pasa que dice que le falta un campo redirect_uri
  
### Facturas

El package en si es sencillo, es solo meter el text siguiente con los datos de variables que queramos
```shell
$invoice = ConsoleTVs\Invoices\Classes\Invoice::make()
 ->addItem('Test Item', 10.25, 2, 1412)
 ->addItem('Test Item 2', 5, 2, 923)
 ->addItem('Test Item 3', 15.55, 5, 42)
 ->addItem('Test Item 4', 1.25, 1, 923)
 ->addItem('Test Item 5', 3.12, 1, 3142)
 ->addItem('Test Item 6', 6.41, 3, 452)
 ->addItem('Test Item 7', 2.86, 1, 1526)
 ->number(4021)
 ->tax(21)
 ->notes('Lrem ipsum dolor sit amet, consectetur adipiscing elit.')
 ->customer([
  'name' => 'Èrik Campobadal Forés',
  'id' => '12345678A',
  'phone' => '+34 123 456 789',
  'location' => 'C / Unknown Street 1st',
  'zip' => '08241',
  'city' => 'Manresa',
  'country' => 'Spain',
 ])
 ->download('demo');
```

### License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
