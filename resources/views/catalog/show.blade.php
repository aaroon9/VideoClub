

@extends('layouts.master')

@section('content')

    <div class="row">

	    <div class="col-sm-4">

	        <img class="img-show" height="400" width="270" src="{{$pelicula->poster}}"/>

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
            <?php /*<div class="form-group">
              <label for="exampleFormControlSelect1" style="font-weight: bold;">Días de alquiler</label>
                <select class="form-control"name="diasD" id="diasD">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
            </div>*/ ?>
            <input type="hidden" name="precio" id="precio" value="{{$pelicula->precio}}">
	        			<button type="submit" class="btn btn-warning"><a>Añadir a favoritos</a>
	        			</button>
				</form>
        <form action="{{action('CartController@createItem', $pelicula->id)}}"
        method="POST" style="display:inline">

          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <?php /*<div class="form-group">
            <label for="exampleFormControlSelect1" style="font-weight: bold;">Días de alquiler</label>
              <select class="form-control"name="diasD" id="diasD">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
          </div>*/ ?>
              <input type="hidden" name="precio" id="precio" value="{{$pelicula->precio}}">
              <button type="submit" class="btn btn-info"><a>Añadir al carrito</a>
              </button>
          </form>

	        <?php endif ?>
	        <?php /*<a class="btn btn-warning" href="/catalog/edit/{{$pelicula->id}}">Editar película</a>*/ ?>
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
