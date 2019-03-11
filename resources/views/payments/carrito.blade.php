@extends('layouts.master')

@section('content')

<table class="tabla-carrito">
   	<thead>
       	<tr>
           	<th>Pelicula</th>
           	<th>Quantitat</th>
           	<th>Preu</th>
           	<th>Subtotal</th>
       	</tr>
   	</thead>

   	<tbody>
      <tr class="carrito-separacio">
        <td>&nbsp;</td>
      </tr>

   		@foreach( Cart::content() as $row )
      <?php  //dd(Cart::content())   ?>
	        <tr>
           		<td class="carrito-prods">
                @foreach($pelicula as $peli)
                  @if($row->id == $peli->id)
         				     <p>{{ $peli->title }}</p>
                  @endif
                @endforeach
                <!-- <p>{{ $row->quantity }}</p> -->
           		</td>
           		<td class="carrito-prods"><?php echo $row->qty; ?></td>
           		<td class="carrito-prods"><?php echo $row->price; ?>   €</td>
           		<td class="carrito-prods"><?php echo ($row->qty * $row->price) ?> €</td>
       		</tr>

       	@endforeach
    </tbody>

   	<tfoot>
      <tr class="carrito-separacio">
        <td>&nbsp;</td>
      </tr>
   		<tr>
   			<td class="carrito-separacio" colspan="2">&nbsp;</td>
   			<td>Subtotal</td>
   			<td><?php echo Cart::subtotal(); ?> €</td>
   		</tr>
      <!-- podriamos hacer que no hubiera tax hasta la factura, y que esta estuviera ya incluida en el precio -->
   		<!-- <tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Tax</td>
   			<td><?php echo Cart::tax(); ?> €</td>
   		</tr> -->
   		<!-- <tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Total</td>
   			<td><?php echo Cart::total(); ?> €</td>
   		</tr> -->
   	</tfoot>
</table>
<div class="row botones-carrito">
<div class="col">
  <form class="" action="{{action('CartController@destroyCart')}}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    @if(Cart::count() > 0)
      <button type="submit" name="button" class="boton-carrito vaciar-carrito">Vaciar carrito</button>
    @endif
  </form>
</div>
<div class="col-fin">
  <form class="" action="{{action('InvoicesController@myinvoices')}}" method="POST" style="display:inline">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <button type="submit" name="button" class="boton-carrito finalizar-compra">Finalizar compra</button>
  </form>
</div>
</div>

@stop
