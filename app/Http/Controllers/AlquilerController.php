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
    public function putInsert($id_movie, Request $request){

      $dias = $request->input('diasD');
      //dd($dias);

    	$alquiler = new Alquiler;
    	$alquiler->id_user = Auth::user()->id;
    	$alquiler->id_movie = (int)$id_movie;
    	$alquiler->fecha_ini = date("Y-m-d");
    	$alquiler->fecha_fin = date('Y-m-d', strtotime($alquiler->fecha_fin. ' + '.$dias.' days'));
      $alquiler->save();


    	//Restem una pelicula del total
        $peli = Movie::findOrFail($id_movie);
        $peli->unidads -= 1;

        //Guardem els canvis en la base de dades
        $peli->save();

        Notification::success('Pelicula alquilada');

        return redirect('/catalog');
    }

    /*Metodo encargado de devolver una pelicula*/
    public function putReturn($id_movie){
      $userAuth = Auth::user()->id;
    	$alquiler = Alquiler::all();
    	//$alquiler = Alquiler::where('id_movie',47)->delete();
      $peli = Movie::findOrFail($id_movie);
      //dd($alquiler);
      foreach ($alquiler as $userAl) {
        //dd($userAl);
        if($userAl->id_user == $userAuth && $userAl->id_movie == $id_movie){
          //dd($userAl->id_movie);
           $borrar = Alquiler::where([
                    ['id_user', $userAuth],
                    ['id_movie', $id_movie],])->delete();
           $peli->unidads++;
        }
      }

      if($peli->save()){
        Notification::success('Pelicula devuelta');
        return redirect('/catalog/show/'.$id_movie);
      }
    }
    /*Funcion que se encarga de añadir mas dias a un alquiler de un cliente*/
    public function addMore($id_movie, Request $request){
      $alquiler = Alquiler::all();
      $userAuth = Auth::user()->id;
      $dias = $request->input('diasD');

      foreach($alquiler as $alqui) {

        if($alqui->id_user == $userAuth && $alqui->id_movie == $id_movie){
          $fechaMore = date('Y-m-d', strtotime($alqui->fecha_fin. ' + '.$dias.' days'));

          $addMore = new Alquiler;
          $addMore->id_user = Auth::user()->id;
          $addMore->id_movie = $alqui->id_movie;
          $addMore->fecha_ini = $alqui->fecha_ini;
          $addMore->fecha_fin = date($fechaMore);
          $borrar = Alquiler::where([
                   ['id_user', $userAuth],
                   ['id_movie', $id_movie],])->delete();
          $addMore->save();
        }
      }
      Notification::success('Fecha cambiada');
      return redirect('/mysite/show/'.$id_movie);
    }

}
