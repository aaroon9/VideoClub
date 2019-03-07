

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
	        <p><span style="font-weight: bold;">Unidades: </span>{{$pelicula->unidads}}</p>

	        <?php if ($pelicula->unidads >= 0): ?>
	        	<form action="{{action('AlquilerController@putInsert', $pelicula->id)}}"
				    method="POST" style="display:inline">
				    {{ method_field('PUT') }}
				    {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleFormControlSelect1" style="font-weight: bold;">Días de alquiler</label>
                <select class="form-control"name="diasD" id="diasD">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
            </div>
				    	<p><span style="font-weight: bold;">Estado: </span>Película disponible</p>
	        			<button type="submit" class="btn btn-info"><a>Alquilar película</a>
	        			</button>
				</form>

	        <?php endif ?>
	        <a class="btn btn-warning" href="/catalog/edit/{{$pelicula->id}}">Editar película</a>
	        <form action="{{action('CatalogController@deleteMovie', $pelicula->id)}}"
			    method="POST" style="display:inline">
			    {{ method_field('DELETE') }}
			    {{ csrf_field() }}
			    <?php /*<button type="submit" class="btn btn-dark" style="display:inline">
			        Borrar Pelicula
			    </button>*/ ?>
			</form>
	        <a class="btn btn-light" href="/catalog">Volver al listado</a>

	    </div>
	</div>

@stop
