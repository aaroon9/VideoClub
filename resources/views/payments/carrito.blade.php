@extends('layouts.master')

@section('content')

<table>
   	<thead>
       	<tr>
           	<th>Pelicula</th>
           	<th>Quantitat</th>
           	<th>Preu</th>
           	<th>Subtotal</th>
       	</tr>
   	</thead>

   	<tbody>
   		@foreach( Cart::content() as $row )
	        <tr>
           		<td>
       				<p><strong>{{ $row->title }}</strong></p>
               		<p>{{ $row->quantity }}</p>
           		</td>
           		<td><input type="text" value="<?php echo $row->qty; ?>"></td>
           		<td>$<?php echo $row->price; ?></td>
           		<td>$<?php echo $row->total; ?></td>
       		</tr>
       	@endforeach
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
@stop
