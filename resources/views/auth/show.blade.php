

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

          @foreach( $alquilers as $alquiler )
            @if($alquiler->id_user == Auth::user()->id && $alquiler->id_movie == $pelicula->id)
	             <p><span style="font-weight: bold;">Devolver: </span>{{$alquiler->fecha_fin}}</p>
            @endif
          @endforeach


	       <?php /*<form action="{{action('AlquilerController@addMore', $pelicula->id)}}"
				    method="POST" style="display:inline">
				    {{ method_field('PUT') }}
				    {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleFormControlSelect1" style="font-weight: bold;">¿Necesitas más dias?</label>
                <select class="form-control"name="diasD" id="diasD">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                </select>
            </div>
	        			<button type="submit" class="btn btn-info"><a>Añadir más días</a>
	        			</button>
				</form>*/ ?>

	        <?php /*<a class="btn btn-warning" href="/catalog/edit/{{$pelicula->id}}">Editar película</a>*/ ?>
	        <form action="{{action('AlquilerController@putReturn', $pelicula->id)}}"
			    method="POST" style="display:inline">
			    {{ method_field('PUT') }}
			    {{ csrf_field() }}
			     <button type="submit" class="btn btn-dark" style="display:inline">
			        Quitar de favoritos
			    </button>
			</form>
	        <a class="btn btn-light" href="/mysite">Volver al listado</a>

	    </div>
	</div>

@stop
