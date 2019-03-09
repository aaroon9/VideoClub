@extends('layouts.master')

@section('content')

<table  class="table">
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
      <?php /* dd($row)  */ ?>
	        <tr>
           		<td>
              @foreach($pelicula as $peli)
                @if($row->name == $peli->id)
       				<p><strong>{{ $peli->title }}</strong></p>
                @endif
              @endforeach
                <p>{{ $row->quantity }}</p>
           		</td>
           		<td><?php echo $row->qty; ?></td>
           		<td><?php echo $row->price; ?>   €</td>
           		<td><?php echo ($row->qty * $row->price) ?> €</td>
       		</tr>

       	@endforeach
    </tbody>

   	<tfoot>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Subtotal</td>
   			<td><?php echo Cart::subtotal(); ?> €</td>
   		</tr>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Tax</td>
   			<td><?php echo Cart::tax(); ?> €</td>
   		</tr>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Total</td>
   			<td><?php echo Cart::total(); ?> €</td>
   		</tr>
   	</tfoot>
</table>
@stop
