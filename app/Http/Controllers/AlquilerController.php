<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alquiler;
use App\Movie;
use App\User;
use Auth;
use Notification;

class AlquilerController extends Controller
{
    public function putInsert($id_movie){
   
    	$alquiler = new Alquiler;
    	$alquiler->id_user = Auth::user()->id;
    	$alquiler->id_movie = (int)$id_movie;
    	$alquiler->fecha_ini = '2019-02-18';
    	$alquiler->fecha_fin = '2019-02-19';

    	
    	//Restem una pelicula del total
        $peli = Movie::findOrFail($id_movie);
        $peli->unidads -= 1;

        //Guardem els canvis en la base de dades
        $peli->save();
        $alquiler->save();
        Notification::success('Pelicula alquilada');

        return redirect('/catalog/show/'.$id_movie);
    }
    public function putReturn($id_movie){
    	$alquiler = Alquiler::findOrFail(47);
    	dd($alquiler);
    }
}
