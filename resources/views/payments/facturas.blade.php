@extends('layouts.master')

@section('content')

<table class="table" style="color:#fff">
  <thead>
      <tr>
          <th>ID</th>
          <th>Fecha</th>
          <th>Descargar</th>
      </tr>
  </thead>
  <tbody>
    <tr class="carrito-separacio">
      <td>&nbsp;</td>
    </tr>

    @foreach( $facturas as $factura )
      @if($factura->id_user == Auth::user()->id)
          <tr>
              <td class="carrito-prods">
                     <p>{{ $factura->id }}</p>
              </td>
              <td class="carrito-prods">{{$factura->created_at}}</td>
              <td class="carrito-prods"><a href="/download/{{$factura->id}}">Ver Factura</a></td>
          </tr>
        @endif
      @endforeach
  </tbody>

</table>

@stop
