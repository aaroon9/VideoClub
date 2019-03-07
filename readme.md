<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

### Cosas pendientes por seccion

Aqui vamos a ir apuntando por secciones las tareas que se van haciendo, las que estan hechas y las que estan por hacer, para tener un seguimiento del estado actual del proyecto.

## Registro, login, reset pswd

- API RESTful

## Alquiler

- Crear controlador:
    - Insert
    - Update -> Fecha Fin
    - Historial Alquiler
    - Vista Area Usuario
    - Vista ampliada pelicula

- API RESTful

## SCSS

  https://www.youtube.com/watch?v=tFmcOOdiLv0
  - Instalar node.js i npm -> https://www.npmjs.com/get-npm
  - Ejecutar npm run watch para que vaya compilando el css

## Socialite
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
  
## Facturas
El DEV de este package es catala, quina gracia.
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
### Set up
- Instalamos el paquete
  ```shell
  composer require consoletvs/invoices
  ```
- Modificamos parametros
  ```shell
  php artisan vendor:publish --tag=invoices
  ```
  Tambien podemos modificarlos dentro de config/invoices.php 

## Carrito (https://github.com/Crinsane/LaravelShoppingcart)

#### Instalamos el paquete
```shell
composer require gloudemans/shoppingcart
```

#### Funcions
```shell
  Cart::add('293ad', 'Product 1', 1, 9.99);  //Afegir element
  Cart::update($rowId, 2);  // Modificar element, aquest cas modifica quantitat
  Cart::remove($rowId);     // Eliminar element
  Cart::get($rowId);        // Get element
  Cart::content();          // Array d'elements del carrito
  Cart::destroy();          // Elimiina tots els elements del carrito
  Cart::total();            // Valor total del carrito
  Cart::tax();              // Valor total de les taxes
  Cart::subtotal();         // Valor total dels productes sense taxes
  Cart::count();            // Numero de productes dins carrito
```
#### Petit exemple
```shell
// Add some items in your Controller.
Cart::add('192ao12', 'Product 1', 1, 9.99);
Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']);

// Display the content in a View.
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>

      <?php foreach(Cart::content() as $row) :?>

          <tr>
              <td>
                  <p><strong><?php echo $row->name; ?></strong></p>
                  <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
              </td>
              <td><input type="text" value="<?php echo $row->qty; ?>"></td>
              <td>$<?php echo $row->price; ?></td>
              <td>$<?php echo $row->total; ?></td>
          </tr>

      <?php endforeach;?>

    </tbody>
    
    <tfoot>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>Subtotal</td>
        <td><?php echo Cart::subtotal(); ?></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>Tax</td>
        <td><?php echo Cart::tax(); ?></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>Total</td>
        <td><?php echo Cart::total(); ?></td>
      </tr>
    </tfoot>
</table>
```

## Enlaces interes

- Login to guapo: https://www.youtube.com/watch?v=HV7DtH3J2PU

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
