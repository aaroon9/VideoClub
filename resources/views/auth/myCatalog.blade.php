@extends('layouts.master')

@section('content')

  <div class="row">
      <p class="col-lg-12 text-uppercase">Tus peliculas alquiladas</p>

    @foreach( $alquilers as $alquiler )

    @if($alquiler->id_user == Auth::user()->id)

      @foreach($peliculas as $pelicula)

        @if($pelicula->id == $alquiler->id_movie)

        <div class="col-xs-6 col-sm-4 col-md-3 text-center">
            <a href="{{ url('/mysite/show/' . $pelicula->id ) }}">
                <img src="{{$pelicula->poster}}" class="img-catalog" height="400px" width="270px"/>
                <?php /*<h4 style="min-height:45px;margin:5px 0 10px 0">
                    {{$pelicula->title}}
                </h4>*/ ?>
            </a>

        </div>
        @endif
      @endforeach
    @endif
    @endforeach

	</div>

@stop
