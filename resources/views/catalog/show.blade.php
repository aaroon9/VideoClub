

@extends('layouts.master')

@section('content')

    <div class="row">

	    <div class="col-sm-4">

	        <img src="{{$pelicula->poster}}"/>

	    </div>
	    <div class="col-sm-8">

	        <h3>{{$pelicula->title}}</h3>
	        <p style="font-size: 18px";>Año: {{$pelicula->year}}</p>
	        <p style="font-size: 18px";><span>Director: </span>{{$pelicula->director}}</p>
	        <p><span style="font-weight: bold;">Resumen: </span>{{$pelicula->synopsis}}</p>

	        <?php if ($pelicula->rented == false): ?>
	        	<form action="{{action('AlquilerController@putReturn', $pelicula->id)}}"
				    method="POST" style="display:inline">
				    {{ method_field('PUT') }}
				    {{ csrf_field() }}
            <div class="form-group">
              <input type="text" id="dias" name="dias" value="3 days">
              <label class="mt-3" for="customRange3" style="font-weight: bold;">Días de alquiler:</label>&nbsp
              <input type="date" id="fechaAlquiler" class="form-control" min='1899-01-01' max='2020-12-31'>
            </div>
				    	<p><span style="font-weight: bold;">Estado: </span>Película disponible</p>
	        			<button type="submit" class="btn btn-info"><a>Alquilar película</a>
	        			</button>
				</form>


	        <?php endif ?>
	        <?php if ($pelicula->rented == true): ?>
	        	<form action="{{action('AlquilerController@putInsert', $pelicula->id)}}"
				    method="POST" style="display:inline">
				    {{ method_field('PUT') }}
				    {{ csrf_field() }}
				    	<p><span style="font-weight: bold;">Estado: </span>Película no disponible</p>
	        			<button type="submit" class="btn btn-danger"><a>Return pelicula</a>
	        			</button>
				</form>

	        <?php endif ?>
	        <a class="btn btn-warning" href="/catalog/edit/{{$pelicula->id}}">Editar película</a>
	        <form action="{{action('CatalogController@deleteMovie', $pelicula->id)}}"
			    method="POST" style="display:inline">
			    {{ method_field('DELETE') }}
			    {{ csrf_field() }}
			    <button type="submit" class="btn btn-dark" style="display:inline">
			        Borrar Pelicula
			    </button>
			</form>
	        <a class="btn btn-light" href="/catalog">Volver al listado</a>

	    </div>
	</div>

@stop
