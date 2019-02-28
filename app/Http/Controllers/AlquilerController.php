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
    	$alquiler->fecha_ini = date("Y-m-d");
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
        }
      }
      /*no funciona aumentar la cantidad*/
      $peli->unidads++;


      Notification::success('Pelicula devuelta');
      return redirect('/catalog/show/'.$id_movie);
    }

    public function addMore($id_movie, Request $request){
      $alquiler = Alquiler::all();
      $userAuth = Auth::user()->id;
      $dias = $request->input('dias');
      //dd($dias);
      foreach ($alquiler as $alqui) {

        if($alqui->id_user == $userAuth && $alqui->id_movie == 53){
          $patata=new Alquiler();
          $fecha = $alqui->fecha_fin;
          $fechaMore = date('Y-m-d', strtotime($fecha. ' + '.$dias));
          //$alqui->fecha_fin = date('Y-m-d', strtotime($fecha. ' + '.$dias));
          $alqui->fecha_fin = $fechaMore;
          $alqui->save();
          /*$patata->id_user = $alqui->id_user;
          $patata->id_movie = $alqui->id_movie;
          $patata->fecha_ini = $alqui->fecha_ini;
          $patata->fecha_fin = $fechaMore;
          $patata->save();*/

          //dd(strtotime($fecha. ' + 1 days'));
        }
      }
      //$alquiler->save();


    }
}
